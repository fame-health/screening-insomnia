<?php

namespace App\Services;

use App\Models\InsomniaScreening;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\XLSX\Writer;
use RuntimeException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InsomniaScreeningExport
{
    public function excel(): BinaryFileResponse
    {
        $temporaryFile = tempnam(sys_get_temp_dir(), 'insomnia-screenings-');

        if ($temporaryFile === false) {
            throw new RuntimeException('Could not create a temporary export file.');
        }

        $xlsxFile = $temporaryFile . '.xlsx';
        @unlink($temporaryFile);

        try {
            $writer = new Writer();
            $writer->openToFile($xlsxFile);
            $writer->getCurrentSheet()->setName('Data Screening');

            $headerStyle = (new Style())
                ->setFontBold()
                ->setFontColor(Color::WHITE)
                ->setBackgroundColor('173B55');

            $writer->addRow(Row::fromValues([
                'No.',
                'Nama peserta',
                'Umur',
                'Jenis kelamin',
                'Jenis screening',
                'Skor',
                'Ringkasan hasil',
                'Jawaban',
                'Catatan admin',
                'Tanggal screening',
            ], $headerStyle));

            $number = 0;

            foreach (InsomniaScreening::query()->orderBy('id')->cursor() as $record) {
                $number++;

                $writer->addRow(Row::fromValues([
                    $number,
                    $record->participant_name,
                    $record->age,
                    $record->gender,
                    $this->instrumentLabel($record->instrument),
                    (float) $record->score,
                    $record->result_label,
                    $this->answersText($record->answers ?? []),
                    $record->admin_notes ?? '',
                    $record->created_at?->format('Y-m-d H:i:s') ?? '',
                ]));
            }

            $writer->close();
        } catch (\Throwable $exception) {
            @unlink($xlsxFile);

            throw $exception;
        }

        return response()
            ->download($xlsxFile, $this->fileName('xlsx'), [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->deleteFileAfterSend(true);
    }

    public function pdf(): StreamedResponse
    {
        $summary = $this->pdfSummary();
        $pages = [$this->summaryPage($summary)];

        if ($summary['total'] > 0) {
            $pageNumber = 2;
            $commands = $this->detailPageHeader();
            $y = 742;
            $number = 0;

            foreach (InsomniaScreening::query()->orderBy('created_at')->orderBy('id')->cursor() as $record) {
                $number++;

                if ($y < 150) {
                    $pages[] = $commands;
                    $pageNumber++;
                    $commands = $this->detailPageHeader(true);
                    $y = 742;
                }

                $commands .= $this->pdfRect(40, $y - 24, 515, 24, '0.91 0.95 0.98');
                $participantName = mb_strimwidth((string) $record->participant_name, 0, 54, '…', 'UTF-8');
                $commands .= $this->pdfTextCommand(sprintf('%02d   %s', $number, $participantName), 52, $y - 16, 10, true, '0.07 0.20 0.31');
                $commands .= $this->pdfTextCommand($record->created_at?->format('d/m/Y H:i') ?? '-', 450, $y - 16, 8, false, '0.38 0.46 0.53');
                $y -= 39;

                $lines = [
                    ['text' => sprintf('Umur: %s tahun   |   Jenis kelamin: %s   |   Skor: %s / 100', $record->age, $record->gender, $record->score), 'indent' => 0, 'bold' => false],
                    ['text' => 'Jenis screening: ' . $this->instrumentLabel($record->instrument), 'indent' => 0, 'bold' => false],
                    ['text' => 'Ringkasan hasil: ' . $record->result_label, 'indent' => 0, 'bold' => false],
                ];

                if (filled($record->answers)) {
                    $lines[] = ['text' => 'Jawaban screening', 'indent' => 0, 'bold' => true];

                    foreach ($record->answers as $answer) {
                        $question = trim((string) ($answer['question'] ?? 'Pertanyaan'));
                        $value = trim((string) ($answer['answer'] ?? '-'));
                        $score = array_key_exists('score', $answer) ? ' (nilai ' . $answer['score'] . ')' : '';
                        $lines[] = ['text' => '• ' . $question . ': ' . $value . $score, 'indent' => 8, 'bold' => false];
                    }
                }

                if (filled($record->admin_notes)) {
                    $lines[] = ['text' => 'Catatan admin: ' . $record->admin_notes, 'indent' => 0, 'bold' => false];
                }

                foreach ($lines as $line) {
                    foreach ($this->wrapPdfText($line['text'], 84) as $wrappedLine) {
                        if ($y < 52) {
                            $pages[] = $commands;
                            $pageNumber++;
                            $commands = $this->detailPageHeader(true);
                            $y = 742;
                        }

                        $commands .= $this->pdfTextCommand(
                            $wrappedLine,
                            52 + $line['indent'],
                            $y,
                            $line['bold'] ? 9 : 8,
                            $line['bold'],
                            $line['bold'] ? '0.12 0.37 0.91' : '0.18 0.24 0.30',
                        );
                        $y -= $line['bold'] ? 14 : 12;
                    }
                }

                $y -= 7;
                $commands .= $this->pdfLine(40, $y, 555, $y, '0.84 0.89 0.93');
                $y -= 15;
            }

            $pages[] = $commands;
        }

        foreach ($pages as $index => &$pageCommands) {
            $pageCommands .= $this->pdfTextCommand(
                sprintf('INSOMNIA REMAJA  •  HALAMAN %d / %d', $index + 1, count($pages)),
                40,
                26,
                7,
                true,
                '0.48 0.56 0.63',
            );
            $pageCommands .= $this->pdfLine(40, 39, 555, 39, '0.88 0.91 0.94');
        }
        unset($pageCommands);

        $pdf = $this->buildPdf($pages);

        return response()->streamDownload(
            static function () use ($pdf): void {
                echo $pdf;
            },
            $this->fileName('pdf'),
            ['Content-Type' => 'application/pdf'],
        );
    }

    /** @return array{total: int, average: float, thisMonth: int, instruments: array<string, int>, genders: array<string, int>, months: list<array{label: string, count: int}>} */
    private function pdfSummary(): array
    {
        $total = InsomniaScreening::query()->count();
        $average = (float) (InsomniaScreening::query()->avg('score') ?? 0);
        $instruments = InsomniaScreening::query()
            ->select('instrument')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('instrument')
            ->pluck('total', 'instrument')
            ->map(fn ($count): int => (int) $count)
            ->all();
        $genders = InsomniaScreening::query()
            ->select('gender')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('gender')
            ->pluck('total', 'gender')
            ->map(fn ($count): int => (int) $count)
            ->all();

        $start = now()->startOfMonth()->subMonths(5);
        $monthNames = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'];
        $months = [];
        $monthCursor = $start->copy();

        for ($index = 0; $index < 6; $index++) {
            $key = $monthCursor->format('Y-m');
            $months[$key] = [
                'label' => $monthNames[(int) $monthCursor->format('n')] . ' ' . $monthCursor->format('y'),
                'count' => 0,
            ];
            $monthCursor->addMonth();
        }

        foreach (InsomniaScreening::query()->where('created_at', '>=', $start)->select('created_at')->cursor() as $record) {
            $key = $record->created_at?->format('Y-m');

            if (isset($months[$key])) {
                $months[$key]['count']++;
            }
        }

        return [
            'total' => $total,
            'average' => $average,
            'thisMonth' => $months[array_key_last($months)]['count'] ?? 0,
            'instruments' => [
                'Screening remaja' => $instruments['remaja'] ?? 0,
                'Masalah medis' => $instruments['medis'] ?? 0,
            ],
            'genders' => [
                'Perempuan' => $genders['Perempuan'] ?? 0,
                'Laki-laki' => $genders['Laki-laki'] ?? 0,
            ],
            'months' => array_values($months),
        ];
    }

    /** @param array<string, mixed> $summary */
    private function summaryPage(array $summary): string
    {
        $commands = $this->pdfRect(0, 730, 595, 112, '0.07 0.20 0.31');
        $commands .= $this->pdfTextCommand('INSOMNIA REMAJA  /  PANEL ADMIN', 40, 818, 8, true, '0.44 0.83 0.91');
        $commands .= $this->pdfTextCommand('Laporan data screening', 40, 791, 20, true, '1 1 1');
        $commands .= $this->pdfTextCommand('Ringkasan dan distribusi screening kualitas tidur remaja', 40, 772, 9, false, '0.86 0.92 0.96');
        $commands .= $this->pdfTextCommand('Dibuat ' . now()->format('d/m/Y  H:i'), 40, 751, 8, false, '0.70 0.81 0.88');
        $commands .= $this->pdfRect(505, 778, 50, 44, '0.12 0.31 0.45');
        $commands .= $this->pdfTextCommand('IR', 517, 794, 15, true, '1 1 1');

        $cards = [
            ['label' => 'TOTAL SCREENING', 'value' => number_format($summary['total'], 0, ',', '.'), 'note' => 'Seluruh data tersimpan'],
            ['label' => 'RATA-RATA SKOR', 'value' => number_format($summary['average'], 1, ',', '.'), 'note' => 'Dari skala 0–100'],
            ['label' => 'SCREENING BULAN INI', 'value' => number_format($summary['thisMonth'], 0, ',', '.'), 'note' => 'Periode bulan berjalan'],
        ];

        foreach ($cards as $index => $card) {
            $x = 40 + ($index * 175);
            $commands .= $this->pdfPanel($x, 626, 163, 78, '0.97 0.98 0.99');
            $commands .= $this->pdfRect($x, 626, 4, 78, $index === 1 ? '0.22 0.72 0.82' : '0.15 0.39 0.91');
            $commands .= $this->pdfTextCommand($card['label'], $x + 14, 685, 7, true, '0.43 0.51 0.59');
            $commands .= $this->pdfTextCommand($card['value'], $x + 14, 656, 20, true, '0.07 0.20 0.31');
            $commands .= $this->pdfTextCommand($card['note'], $x + 14, 639, 7, false, '0.48 0.56 0.63');
        }

        $commands .= $this->horizontalBarChart(40, 428, 251, 180, 'Jenis screening', $summary['instruments'], '0.15 0.39 0.91');
        $commands .= $this->horizontalBarChart(304, 428, 251, 180, 'Jenis kelamin peserta', $summary['genders'], '0.13 0.61 0.69');
        $commands .= $this->monthlyBarChart(40, 210, 515, 198, $summary['months']);
        $commands .= $this->pdfTextCommand('Grafik menunjukkan jumlah data yang tercatat; ringkasan hasil bukan diagnosis medis.', 42, 188, 7, false, '0.48 0.56 0.63');

        if ($summary['total'] === 0) {
            $commands .= $this->pdfTextCommand('Belum ada data screening yang dapat ditampilkan.', 42, 170, 9, true, '0.30 0.39 0.47');
        }

        return $commands;
    }

    /** @param array<string, int> $items */
    private function horizontalBarChart(float $x, float $bottom, float $width, float $height, string $title, array $items, string $barColor): string
    {
        $top = $bottom + $height;
        $commands = $this->pdfPanel($x, $bottom, $width, $height, '1 1 1');
        $commands .= $this->pdfTextCommand($title, $x + 14, $top - 23, 10, true, '0.07 0.20 0.31');

        if ($items === []) {
            return $commands . $this->pdfTextCommand('Belum ada data', $x + 14, $top - 55, 8, false, '0.48 0.56 0.63');
        }

        $max = max(1, ...array_values($items));
        $index = 0;

        foreach ($items as $label => $count) {
            $labelY = $top - 51 - ($index * 46);
            $trackX = $x + 14;
            $trackWidth = $width - 48;
            $barWidth = $count > 0 ? max(3, ($trackWidth * $count / $max)) : 0;

            $commands .= $this->pdfTextCommand((string) $label, $trackX, $labelY, 8, false, '0.28 0.36 0.43');
            $commands .= $this->pdfTextCommand(number_format($count, 0, ',', '.'), $x + $width - 27, $labelY, 8, true, '0.07 0.20 0.31');
            $commands .= $this->pdfRect($trackX, $labelY - 13, $trackWidth, 6, '0.91 0.94 0.96');

            if ($barWidth > 0) {
                $commands .= $this->pdfRect($trackX, $labelY - 13, $barWidth, 6, $barColor);
            }

            $index++;
        }

        return $commands;
    }

    /** @param list<array{label: string, count: int}> $months */
    private function monthlyBarChart(float $x, float $bottom, float $width, float $height, array $months): string
    {
        $top = $bottom + $height;
        $commands = $this->pdfPanel($x, $bottom, $width, $height, '1 1 1');
        $commands .= $this->pdfTextCommand('Tren screening  •  6 bulan terakhir', $x + 14, $top - 23, 10, true, '0.07 0.20 0.31');

        $plotLeft = $x + 23;
        $plotWidth = $width - 46;
        $baseline = $bottom + 39;
        $maxBarHeight = $height - 82;
        $max = max(1, ...array_column($months, 'count'));

        foreach ([0.33, 0.66, 1.0] as $fraction) {
            $gridY = $baseline + ($maxBarHeight * $fraction);
            $commands .= $this->pdfLine($plotLeft, $gridY, $plotLeft + $plotWidth, $gridY, '0.91 0.94 0.96');
        }

        $slotWidth = $plotWidth / max(1, count($months));
        $barWidth = min(38, $slotWidth * 0.52);

        foreach ($months as $index => $month) {
            $barHeight = $month['count'] > 0 ? max(3, $maxBarHeight * $month['count'] / $max) : 2;
            $barX = $plotLeft + ($slotWidth * $index) + (($slotWidth - $barWidth) / 2);
            $commands .= $this->pdfRect($barX, $baseline, $barWidth, $barHeight, $index === count($months) - 1 ? '0.13 0.61 0.69' : '0.15 0.39 0.91');
            $commands .= $this->pdfTextCommand((string) $month['count'], $barX + ($barWidth / 2) - 4, $baseline + $barHeight + 8, 7, true, '0.28 0.36 0.43');
            $commands .= $this->pdfTextCommand($month['label'], $barX - 5, $bottom + 20, 7, false, '0.43 0.51 0.59');
        }

        return $commands;
    }

    private function detailPageHeader(bool $continued = false): string
    {
        $title = $continued ? 'Rincian peserta  /  lanjutan' : 'Rincian data peserta';
        $commands = $this->pdfRect(0, 766, 595, 76, '0.07 0.20 0.31');
        $commands .= $this->pdfTextCommand('INSOMNIA REMAJA  /  PANEL ADMIN', 40, 819, 8, true, '0.44 0.83 0.91');
        $commands .= $this->pdfTextCommand($title, 40, 793, 17, true, '1 1 1');
        $commands .= $this->pdfTextCommand('Data dan jawaban screening yang tercatat', 40, 775, 8, false, '0.86 0.92 0.96');

        return $commands;
    }

    private function pdfPanel(float $x, float $y, float $width, float $height, string $fill): string
    {
        return $this->pdfRect($x, $y, $width, $height, $fill)
            . "0.87 0.90 0.93 RG\n"
            . sprintf('%.2f %.2f %.2f %.2f re S' . "\n", $x, $y, $width, $height);
    }

    private function pdfRect(float $x, float $y, float $width, float $height, string $fill): string
    {
        return $fill . " rg\n" . sprintf('%.2f %.2f %.2f %.2f re f' . "\n", $x, $y, $width, $height);
    }

    private function pdfLine(float $x1, float $y1, float $x2, float $y2, string $stroke): string
    {
        return $stroke . " RG\n" . sprintf('%.2f %.2f m %.2f %.2f l S' . "\n", $x1, $y1, $x2, $y2);
    }

    private function pdfTextCommand(string $text, float $x, float $y, int $size, bool $bold, string $color): string
    {
        $font = $bold ? 'F2' : 'F1';

        return $color . " rg\n" . sprintf(
            "BT /%s %d Tf 1 0 0 1 %.2f %.2f Tm (%s) Tj ET\n",
            $font,
            $size,
            $x,
            $y,
            $this->escapePdfString($this->toPdfText($text)),
        );
    }

    /** @return list<string> */
    private function wrapPdfText(string $text, int $width): array
    {
        $text = $this->toPdfText($text);

        return explode("\n", wordwrap($text, $width, "\n", true));
    }

    /** @param list<string> $pages */
    private function buildPdf(array $pages): string
    {
        $pageCount = count($pages);
        $regularFontId = 3 + ($pageCount * 2);
        $boldFontId = $regularFontId + 1;

        $objects = [
            1 => '<< /Type /Catalog /Pages 2 0 R >>',
        ];
        $kids = [];

        foreach ($pages as $index => $content) {
            $pageId = 3 + ($index * 2);
            $contentId = $pageId + 1;
            $kids[] = $pageId . ' 0 R';
            $objects[$pageId] = sprintf(
                '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 %d 0 R /F2 %d 0 R >> >> /Contents %d 0 R >>',
                $regularFontId,
                $boldFontId,
                $contentId,
            );
            $objects[$contentId] = sprintf(
                "<< /Length %d >>\nstream\n%s\nendstream",
                strlen($content),
                $content,
            );
        }

        $objects[2] = sprintf('<< /Type /Pages /Kids [%s] /Count %d >>', implode(' ', $kids), $pageCount);
        $objects[$regularFontId] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica /Encoding /WinAnsiEncoding >>';
        $objects[$boldFontId] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold /Encoding /WinAnsiEncoding >>';
        ksort($objects);

        $pdf = "%PDF-1.4\n%\xE2\xE3\xCF\xD3\n";
        $offsets = [0 => 0];

        foreach ($objects as $id => $object) {
            $offsets[$id] = strlen($pdf);
            $pdf .= $id . " 0 obj\n" . $object . "\nendobj\n";
        }

        $xrefOffset = strlen($pdf);
        $size = max(array_keys($objects)) + 1;
        $pdf .= "xref\n0 {$size}\n0000000000 65535 f \n";

        for ($id = 1; $id < $size; $id++) {
            $pdf .= sprintf("%010d 00000 n \n", $offsets[$id]);
        }

        $pdf .= sprintf(
            "trailer\n<< /Size %d /Root 1 0 R >>\nstartxref\n%d\n%%%%EOF",
            $size,
            $xrefOffset,
        );

        return $pdf;
    }

    private function instrumentLabel(?string $instrument): string
    {
        return $instrument === 'medis' ? 'Screening masalah medis' : 'Screening insomnia remaja';
    }

    /** @param array<array<string, mixed>> $answers */
    private function answersText(array $answers): string
    {
        return collect($answers)
            ->map(function (array $answer): string {
                $question = trim((string) ($answer['question'] ?? 'Pertanyaan'));
                $value = trim((string) ($answer['answer'] ?? '-'));
                $score = array_key_exists('score', $answer) ? ' (nilai ' . $answer['score'] . ')' : '';

                return $question . ': ' . $value . $score;
            })
            ->implode(' | ');
    }

    private function toPdfText(string $value): string
    {
        $value = html_entity_decode(strip_tags($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $value = preg_replace('/[\r\n\t]+/u', ' ', $value) ?? $value;

        return iconv('UTF-8', 'Windows-1252//TRANSLIT//IGNORE', $value) ?: '';
    }

    private function escapePdfString(string $value): string
    {
        return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $value);
    }

    private function fileName(string $extension): string
    {
        return 'data-screening-insomnia-' . now()->format('Y-m-d_H-i') . '.' . $extension;
    }
}
