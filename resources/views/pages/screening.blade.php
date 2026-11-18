@extends('layouts.app')

@section('title', 'Screening Kualitas Tidur')
@section('meta_description', 'Isi screening edukatif tentang pola tidur remaja dan lihat ringkasan jawaban sebagai bahan refleksi, bukan diagnosis medis.')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-9 sm:px-8 sm:py-14">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali pola tidurmu</p>
            <div class="mt-4 grid gap-7 lg:grid-cols-[1fr_0.6fr] lg:items-end">
                <div><h1 class="max-w-3xl text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Screening insomnia remaja</h1><p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:mt-5 sm:text-base sm:leading-8">Jawab beberapa pertanyaan tentang istirahat dan aktivitas sehari-hari untuk melihat ringkasan jawabanmu.</p></div>
                <div class="flex items-start gap-2.5 border-l-2 border-blue-300 pl-3 text-xs leading-5 text-slate-600 sm:gap-3 sm:rounded-2xl sm:border sm:border-blue-100 sm:bg-white sm:p-4 sm:text-sm sm:leading-6 sm:shadow-sm"><span class="mt-0.5 text-blue-700">ⓘ</span><p>Screening ini bersifat edukatif. Hasil bukan diagnosis medis dan tidak menggantikan konsultasi tenaga kesehatan.</p></div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-4 py-7 sm:px-8 sm:py-16">
        @include('pages.partials.screening', ['questions' => $questions, 'scoreMode' => 'concern'])
    </section>
@endsection
