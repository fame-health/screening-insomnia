@extends('layouts.app')

@section('title', 'Dampak Medis Gangguan Tidur')
@section('meta_description', 'Kenali hubungan pola tidur dengan energi, fokus, dan suasana hati, serta pahami perbedaan insomnia akut dan kronis.')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-9 sm:px-8 sm:py-16">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kesehatan dan istirahat</p>
            <h1 class="mt-3 max-w-3xl text-3xl font-extrabold tracking-tight text-slate-900 sm:mt-4 sm:text-5xl">Masalah medis yang dapat berkaitan dengan tidur.</h1>
            <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:mt-5 sm:text-base sm:leading-8">Tidur berperan dalam keseharian, suasana hati, dan konsentrasi. Kenali perubahan yang kamu rasakan dan cari dukungan jika keluhan terus berlanjut.</p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-8 sm:px-8 sm:py-14">
        <div class="grid gap-0 divide-y divide-slate-200 border-y border-slate-200 md:grid-cols-3 md:gap-5 md:divide-y-0 md:border-0">
            <article class="flex items-start gap-3 py-4 md:block md:rounded-3xl md:border md:border-slate-200 md:bg-white md:p-7 md:shadow-sm"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700 md:h-11 md:w-11"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 3v3m0 12v3M4.2 4.2l2.1 2.1m11.4 11.4 2.1 2.1M3 12h3m12 0h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1M8 15.5A5 5 0 1 1 16 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><div><h2 class="text-base font-extrabold text-slate-900 md:mt-5 md:text-lg">Energi dan fokus</h2><p class="mt-1.5 text-sm leading-6 text-slate-600 md:mt-2 md:leading-7">Tidur yang tidak cukup dapat membuat aktivitas sehari-hari terasa lebih berat dan fokus menurun.</p></div></article>
            <article class="flex items-start gap-3 py-4 md:block md:rounded-3xl md:border md:border-slate-200 md:bg-white md:p-7 md:shadow-sm"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-700 md:h-11 md:w-11"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 21s8-4 8-10V5l-8-3-8 3v6c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 12h6m-3-3v6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><div><h2 class="text-base font-extrabold text-slate-900 md:mt-5 md:text-lg">Suasana hati</h2><p class="mt-1.5 text-sm leading-6 text-slate-600 md:mt-2 md:leading-7">Perubahan pola tidur dapat berjalan bersama perubahan suasana hati. Ceritakan apa yang kamu alami kepada orang tepercaya.</p></div></article>
            <article class="flex items-start gap-3 py-4 md:block md:rounded-3xl md:border md:border-slate-200 md:bg-white md:p-7 md:shadow-sm"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-100 text-sky-700 md:h-11 md:w-11"><svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M12 3v18m-7-4 14-10M5 7l14 10M4 12h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span><div><h2 class="text-base font-extrabold text-slate-900 md:mt-5 md:text-lg">Kebiasaan harian</h2><p class="mt-1.5 text-sm leading-6 text-slate-600 md:mt-2 md:leading-7">Jadwal, aktivitas sebelum tidur, konsumsi stimulan, dan lingkungan dapat ikut memengaruhi istirahat.</p></div></article>
        </div>

        <div class="mt-9 grid gap-6 lg:mt-14 lg:grid-cols-[0.7fr_1.3fr] lg:gap-20">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali jenisnya</p><h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-4 sm:text-3xl">Insomnia akut dan kronis</h2><p class="mt-3 text-sm leading-7 text-slate-600 sm:mt-4">Pola gangguan tidur dapat berbeda pada tiap orang. Catatan tentang kapan keluhan muncul bisa membantu percakapan dengan tenaga kesehatan.</p></div>
            <div class="divide-y divide-slate-200 border-y border-slate-200 lg:space-y-4 lg:divide-y-0 lg:border-0">
                <article class="py-4 lg:rounded-3xl lg:border lg:border-slate-200 lg:bg-white lg:p-6"><h3 class="text-base font-extrabold text-slate-900 sm:text-lg">Insomnia akut</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2 sm:leading-7">Kesulitan tidur dalam jangka pendek, yang dapat muncul selama beberapa hari atau minggu. Stres atau perubahan lingkungan bisa menjadi salah satu pemicunya.</p></article>
                <article class="py-4 lg:rounded-3xl lg:border lg:border-slate-200 lg:bg-white lg:p-6"><h3 class="text-base font-extrabold text-slate-900 sm:text-lg">Insomnia kronis</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2 sm:leading-7">Kesulitan tidur yang berlangsung lama atau berulang dan mulai mengganggu kegiatan. Tenaga kesehatan dapat membantu mencari faktor yang mendasarinya.</p></article>
            </div>
        </div>
    </section>

    <section class="bg-white py-10 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:gap-10 sm:px-8 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Bahan refleksi</p><h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-4 sm:text-3xl">Screening kualitas tidur</h2><p class="mt-3 text-sm leading-7 text-slate-600 sm:mt-4">Gunakan kuesioner ini untuk merangkum jawaban tentang pola tidur. Hasilnya bersifat edukatif dan bukan diagnosis.</p></div>
            <div>
                @include('pages.partials.screening', ['questions' => $questions, 'scoreMode' => 'quality'])
            </div>
        </div>
    </section>
@endsection
