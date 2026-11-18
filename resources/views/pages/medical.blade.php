@extends('layouts.app')

@section('title', 'Masalah Medis')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kesehatan dan istirahat</p>
            <h1 class="mt-4 max-w-3xl text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Masalah medis yang dapat berkaitan dengan tidur.</h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">Tidur berperan dalam keseharian, suasana hati, dan konsentrasi. Kenali perubahan yang kamu rasakan dan cari dukungan jika keluhan terus berlanjut.</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8 sm:py-18">
        <div class="grid gap-5 md:grid-cols-3">
            <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-700"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 3v3m0 12v3M4.2 4.2l2.1 2.1m11.4 11.4 2.1 2.1M3 12h3m12 0h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1M8 15.5A5 5 0 1 1 16 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><h2 class="mt-5 text-lg font-extrabold text-slate-900">Energi dan fokus</h2><p class="mt-2 text-sm leading-7 text-slate-600">Tidur yang tidak cukup dapat membuat aktivitas sehari-hari terasa lebih berat dan fokus menurun.</p></article>
            <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 21s8-4 8-10V5l-8-3-8 3v6c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 12h6m-3-3v6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><h2 class="mt-5 text-lg font-extrabold text-slate-900">Suasana hati</h2><p class="mt-2 text-sm leading-7 text-slate-600">Perubahan pola tidur dapat berjalan bersama perubahan suasana hati. Ceritakan apa yang kamu alami kepada orang tepercaya.</p></article>
            <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-100 text-sky-700"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 3v18m-7-4 14-10M5 7l14 10M4 12h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><h2 class="mt-5 text-lg font-extrabold text-slate-900">Kebiasaan harian</h2><p class="mt-2 text-sm leading-7 text-slate-600">Jadwal, aktivitas sebelum tidur, konsumsi stimulan, dan lingkungan dapat ikut memengaruhi istirahat.</p></article>
        </div>

        <div class="mt-14 grid gap-10 lg:grid-cols-[0.7fr_1.3fr] lg:gap-20">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali jenisnya</p><h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900">Insomnia akut dan kronis</h2><p class="mt-4 text-sm leading-7 text-slate-600">Pola gangguan tidur dapat berbeda pada tiap orang. Catatan tentang kapan keluhan muncul bisa membantu percakapan dengan tenaga kesehatan.</p></div>
            <div class="space-y-4">
                <article class="rounded-3xl border border-slate-200 bg-white p-6"><h3 class="text-lg font-extrabold text-slate-900">Insomnia akut</h3><p class="mt-2 text-sm leading-7 text-slate-600">Kesulitan tidur dalam jangka pendek, yang dapat muncul selama beberapa hari atau minggu. Stres atau perubahan lingkungan bisa menjadi salah satu pemicunya.</p></article>
                <article class="rounded-3xl border border-slate-200 bg-white p-6"><h3 class="text-lg font-extrabold text-slate-900">Insomnia kronis</h3><p class="mt-2 text-sm leading-7 text-slate-600">Kesulitan tidur yang berlangsung lama atau berulang dan mulai mengganggu kegiatan. Tenaga kesehatan dapat membantu mencari faktor yang mendasarinya.</p></article>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Bahan refleksi</p><h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900">Screening kualitas tidur</h2><p class="mt-4 text-sm leading-7 text-slate-600">Gunakan kuesioner ini untuk merangkum jawaban tentang pola tidur. Hasilnya bersifat edukatif dan bukan diagnosis.</p></div>
            <div class="rounded-[2rem] bg-slate-50 p-5 sm:p-8">
                @include('pages.partials.screening', ['questions' => $questions, 'scoreMode' => 'quality'])
            </div>
        </div>
    </section>
@endsection
