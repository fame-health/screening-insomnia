<?php

namespace Database\Seeders;

use App\Models\ScreeningQuestion;
use Illuminate\Database\Seeder;

class ScreeningQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedInstrument('remaja', [0, 1, 2, 3]);
        $this->seedInstrument('medis', [12, 8, 5, 2]);
    }

    /** @param list<int> $scores */
    private function seedInstrument(string $instrument, array $scores): void
    {
        $questions = [
            ['Apakah Anda kesulitan untuk tidur dalam 30 menit pertama?', ['Tidak masalah', 'Sedikit tertunda', 'Sangat tertunda', 'Sangat terlambat atau tidak tidur sama sekali']],
            ['Apakah Anda terbangun di malam hari?', ['Tidak masalah', 'Masalah kecil', 'Masalah yang cukup besar', 'Masalah serius atau tidak tidur sama sekali']],
            ['Apakah Anda bangun lebih awal dari yang diinginkan?', ['Tidak lebih awal', 'Sedikit lebih awal', 'Jauh lebih awal', 'Jauh lebih awal atau tidak tidur sama sekali']],
            ['Bagaimana total durasi tidur Anda?', ['Cukup', 'Sedikit kurang memadai', 'Sangat tidak mencukupi', 'Sangat tidak cukup atau tidak tidur sama sekali']],
            ['Bagaimana kualitas tidur Anda secara keseluruhan?', ['Memuaskan', 'Sedikit tidak memuaskan', 'Sangat tidak memuaskan', 'Sangat tidak memuaskan atau tidak tidur sama sekali']],
            ['Bagaimana perasaan Anda di siang hari?', ['Biasa saja', 'Sedikit menurun', 'Penurunan yang nyata', 'Sangat menurun']],
            ['Bagaimana fungsi fisik dan mental Anda di siang hari?', ['Biasa saja', 'Sedikit menurun', 'Penurunan yang nyata', 'Sangat menurun']],
            ['Apakah Anda merasa mengantuk di siang hari?', ['Tidak ada', 'Ringan', 'Cukup besar', 'Intens']],
        ];

        foreach ($questions as $index => [$question, $labels]) {
            ScreeningQuestion::firstOrCreate(
                [
                    'instrument' => $instrument,
                    'sort_order' => $index + 1,
                ],
                [
                    'question_text' => $question,
                    'options' => array_map(
                        fn (string $label, int $optionIndex): array => [
                            'label' => $label,
                            'score' => $scores[$optionIndex],
                        ],
                        $labels,
                        array_keys($labels),
                    ),
                    'is_active' => true,
                ],
            );
        }
    }
}
