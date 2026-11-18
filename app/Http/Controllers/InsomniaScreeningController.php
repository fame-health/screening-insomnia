<?php

namespace App\Http\Controllers;

use App\Models\InsomniaScreening;
use App\Models\ScreeningQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InsomniaScreeningController extends Controller
{
    public function teen()
    {
        return view('pages.screening', [
            'questions' => ScreeningQuestion::forInstrument('remaja')->get(),
        ]);
    }

    public function medical()
    {
        return view('pages.medical', [
            'questions' => ScreeningQuestion::forInstrument('medis')->get(),
        ]);
    }

    public function storeTeen(Request $request): JsonResponse
    {
        return $this->store($request, 'remaja');
    }

    public function storeMedical(Request $request): JsonResponse
    {
        return $this->store($request, 'medis');
    }

    private function store(Request $request, string $instrument): JsonResponse
    {
        $questions = ScreeningQuestion::forInstrument($instrument)->get();

        if ($questions->isEmpty()) {
            return response()->json([
                'message' => 'Pertanyaan screening belum tersedia. Silakan coba lagi nanti.',
            ], 503);
        }

        $validated = $request->validate([
            'participant_name' => ['required', 'string', 'max:80'],
            'age' => ['required', 'integer', 'min:10', 'max:25'],
            'gender' => ['required', 'in:Perempuan,Laki-laki'],
            'consent' => ['accepted'],
            'answers' => ['required', 'array', 'size:'.$questions->count()],
            'answers.*' => ['required', 'integer', 'min:0', 'max:3'],
        ]);

        $expectedIds = $questions->modelKeys();
        $providedIds = array_map('intval', array_keys($validated['answers']));
        sort($expectedIds);
        sort($providedIds);

        if ($expectedIds !== $providedIds) {
            throw ValidationException::withMessages([
                'answers' => 'Jawab seluruh pertanyaan yang tersedia sebelum mengirim hasil.',
            ]);
        }

        $answerDetails = [];
        $totalScore = 0;
        $maximumScore = 0;

        foreach ($questions as $question) {
            $selectedIndex = (int) $validated['answers'][$question->id];
            $options = $question->options ?? [];
            $selectedOption = $options[$selectedIndex] ?? null;

            if (! is_array($selectedOption) || ! isset($selectedOption['label'], $selectedOption['score'])) {
                throw ValidationException::withMessages([
                    'answers' => 'Pilihan jawaban tidak lagi tersedia. Muat ulang halaman dan coba lagi.',
                ]);
            }

            $score = (int) $selectedOption['score'];
            $highestOptionScore = max(array_map(
                fn (array $option): int => (int) ($option['score'] ?? 0),
                $options,
            ));

            $totalScore += $score;
            $maximumScore += $highestOptionScore;
            $answerDetails[] = [
                'question' => $question->question_text,
                'answer' => (string) $selectedOption['label'],
                'score' => $score,
            ];
        }

        if ($maximumScore <= 0) {
            return response()->json([
                'message' => 'Skala pertanyaan belum dikonfigurasi dengan benar.',
            ], 422);
        }

        $score = round(($totalScore / $maximumScore) * 100, 2);
        [$resultLabel, $interpretation] = $this->interpret($instrument, $score);

        InsomniaScreening::create([
            'participant_name' => $validated['participant_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'instrument' => $instrument,
            'score' => $score,
            'result_label' => $resultLabel,
            'answers' => $answerDetails,
        ]);

        return response()->json([
            'score' => $score,
            'result_label' => $resultLabel,
            'interpretation' => $interpretation,
        ]);
    }

    /** @return array{0: string, 1: string} */
    private function interpret(string $instrument, float $score): array
    {
        if ($instrument === 'medis') {
            if ($score >= 80) {
                return [
                    'Sebagian besar jawaban menunjukkan tidur yang cukup baik',
                    'Jawaban lebih banyak berada pada pilihan yang menunjukkan sedikit atau tanpa kendala tidur. Pertahankan rutinitas istirahat yang terasa nyaman bagi Anda.',
                ];
            }

            if ($score >= 40) {
                return [
                    'Beberapa kendala tidur tercatat',
                    'Jawaban menunjukkan gabungan pengalaman tidur yang cukup baik dan beberapa kesulitan. Amati apakah keluhan berulang atau mengganggu kegiatan sehari-hari.',
                ];
            }

            return [
                'Sejumlah kendala tidur tercatat',
                'Jawaban lebih banyak berada pada pilihan yang menunjukkan kesulitan tidur. Pertimbangkan untuk membicarakannya dengan orang dewasa tepercaya atau tenaga kesehatan.',
            ];
        }

        if ($score <= 25) {
            return [
                'Sedikit kendala tidur tercatat',
                'Jawaban lebih banyak berada pada pilihan yang menunjukkan sedikit atau tanpa kendala tidur. Pertahankan kebiasaan istirahat yang mendukung kesehatan Anda.',
            ];
        }

        if ($score <= 50) {
            return [
                'Beberapa kendala tidur tercatat',
                'Jawaban menunjukkan beberapa kesulitan tidur. Amati kebiasaan yang membantu Anda beristirahat dan perubahan yang mungkin memengaruhi pola tidur.',
            ];
        }

        if ($score <= 75) {
            return [
                'Cukup banyak kendala tidur tercatat',
                'Jawaban menunjukkan kesulitan di beberapa area tidur atau aktivitas siang hari. Bicarakan dengan orang tepercaya jika hal ini mengganggu keseharian.',
            ];
        }

        return [
            'Banyak kendala tidur tercatat',
            'Jawaban menunjukkan kesulitan pada hampir seluruh area yang ditanyakan. Anda dapat mendiskusikan pengalaman ini dengan orang dewasa tepercaya atau tenaga kesehatan.',
        ];
    }
}
