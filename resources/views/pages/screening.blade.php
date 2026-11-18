@extends('layouts.app')

@section('title', 'Screening Insomnia Remaja')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-18">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali pola tidurmu</p>
            <div class="mt-4 grid gap-7 lg:grid-cols-[1fr_0.6fr] lg:items-end">
                <div><h1 class="max-w-3xl text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Screening insomnia remaja</h1><p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">Jawab beberapa pertanyaan tentang istirahat dan aktivitas sehari-hari untuk melihat ringkasan jawabanmu.</p></div>
                <div class="flex items-start gap-3 rounded-2xl border border-blue-100 bg-white p-4 text-sm leading-6 text-slate-600 shadow-sm"><span class="mt-0.5 text-blue-700">ⓘ</span><p>Screening ini bersifat edukatif. Hasil bukan diagnosis medis dan tidak menggantikan konsultasi tenaga kesehatan.</p></div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-5 py-12 sm:px-8 sm:py-16">
        @include('pages.partials.screening', ['questions' => $questions, 'scoreMode' => 'concern'])
    </section>
@endsection
