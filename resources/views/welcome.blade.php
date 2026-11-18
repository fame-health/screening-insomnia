@extends('layouts.app')

@section('title', 'Edukasi Insomnia dan Tidur')
@section('meta_description', 'Pelajari insomnia dan kebiasaan tidur sehat, lalu coba screening edukatif untuk mengenali pola istirahat remaja.')

@section('content')
    <section class="relative isolate overflow-hidden bg-blue-700 text-white">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,_rgba(147,197,253,0.38),_transparent_42%),linear-gradient(125deg,_#123c9c,_#1d4ed8_55%,_#2563eb)]"></div>
        <div class="absolute -right-20 top-12 -z-10 h-80 w-80 rounded-full border border-white/10 sm:right-8 sm:top-0 sm:h-[30rem] sm:w-[30rem]"></div>
        <div class="absolute -right-8 top-24 -z-10 h-60 w-60 rounded-full border border-white/10 sm:right-20 sm:top-12 sm:h-96 sm:w-96"></div>
        <div class="mx-auto grid max-w-7xl items-center gap-8 px-5 py-12 sm:gap-12 sm:px-8 sm:py-28 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16 lg:py-32">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.14em] text-blue-100 sm:px-4 sm:py-2 sm:text-xs sm:tracking-[0.16em]">
                    <span class="h-2 w-2 rounded-full bg-sky-300"></span> Kenali kualitas tidurmu
                </span>
                <h1 class="mt-5 text-3xl font-extrabold leading-[1.1] tracking-tight sm:mt-7 sm:text-5xl sm:leading-[1.08] lg:text-6xl">Tidur lebih baik,<br class="hidden sm:block"> jalani hari dengan <span class="text-sky-200">lebih baik.</span></h1>
                <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100 sm:mt-6 sm:text-lg sm:leading-8">Pahami insomnia, kenali kebiasaan tidur, dan temukan langkah sederhana untuk menjaga istirahat yang lebih berkualitas.</p>
                <div class="mt-6 flex flex-col gap-2.5 sm:mt-9 sm:flex-row sm:gap-3">
                    <a href="{{ route('screening') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3.5 text-sm font-extrabold text-blue-800 shadow-xl shadow-blue-950/20 transition hover:-translate-y-0.5 hover:bg-blue-50">
                        Mulai screening
                        <svg viewBox="0 0 20 20" class="h-4 w-4" fill="none" aria-hidden="true"><path d="M4 10h12m-5-5 5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="#tentang-insomnia" class="inline-flex items-center justify-center rounded-full border border-white/30 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-white/10">Pelajari insomnia</a>
                </div>
                <p class="mt-4 text-xs leading-5 text-blue-100/80 sm:mt-5">Screening ini untuk informasi awal dan tidak menggantikan konsultasi tenaga kesehatan.</p>
            </div>

            <div class="relative mx-auto w-full max-w-md sm:max-w-lg">
                <div class="absolute -left-6 top-14 h-24 w-24 rounded-3xl bg-sky-300/20 blur-xl"></div>
                <div class="relative rounded-2xl border border-white/20 bg-white/10 p-3 shadow-2xl shadow-blue-950/30 backdrop-blur-sm sm:rounded-[2rem] sm:p-6">
                    <div class="rounded-xl bg-white p-4 text-slate-800 sm:rounded-[1.5rem] sm:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold text-slate-500">Ruang istirahat</p>
                                <p class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900">Tenangkan malammu</p>
                            </div>
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700 sm:h-12 sm:w-12 sm:rounded-2xl">
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M4 18V9m0 5h16v4M4 11h7a3 3 0 0 1 3 3m0-3h3a3 3 0 0 1 3 3M4 18h16M7 9V6h4v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        <div class="mt-5 flex items-center gap-3 rounded-xl bg-blue-50 p-3 sm:mt-7 sm:gap-5 sm:rounded-2xl sm:p-5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-700 text-white sm:h-16 sm:w-16">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 sm:h-8 sm:w-8" fill="none" aria-hidden="true"><path d="M19.2 15.7A8 8 0 0 1 8.3 4.8a8.1 8.1 0 1 0 10.9 10.9Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="m16.8 5.2.5 1.4 1.4.5-1.4.5-.5 1.4-.5-1.4-1.4-.5 1.4-.5.5-1.4Z" fill="currentColor"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Kebiasaan kecil, dampak berarti</p>
                                <p class="mt-1 text-sm leading-6 text-slate-600">Rutinitas yang teratur membantu tubuh mengenali waktu istirahat.</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2.5 sm:mt-6 sm:space-y-3">
                            <div class="flex items-center gap-3 text-sm font-medium text-slate-600"><span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">✓</span> Jadwal tidur konsisten</div>
                            <div class="flex items-center gap-3 text-sm font-medium text-slate-600"><span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">✓</span> Kurangi layar sebelum tidur</div>
                            <div class="flex items-center gap-3 text-sm font-medium text-slate-600"><span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">✓</span> Ciptakan suasana nyaman</div>
                        </div>
                    </div>
                    <div class="absolute -right-5 -top-5 hidden rounded-2xl bg-white px-4 py-3 text-sm font-bold text-blue-800 shadow-xl sm:block">Selamat datang 👋</div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang-insomnia" class="mx-auto max-w-7xl px-5 py-12 sm:px-8 sm:py-20 lg:py-28">
        <div class="grid gap-7 lg:grid-cols-[0.75fr_1.25fr] lg:gap-20">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali lebih dekat</span>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-4 sm:text-4xl">Apa itu insomnia?</h2>
                <div class="mt-6 h-1.5 w-16 rounded-full bg-blue-600"></div>
                <a href="{{ route('medical') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-blue-700 transition hover:text-blue-900 sm:mt-8">Lihat dampak pada kesehatan <span aria-hidden="true">→</span></a>
            </div>
            <div class="space-y-4 text-sm leading-7 text-slate-600 sm:space-y-5 sm:text-base sm:leading-8">
                <p>Insomnia adalah gangguan tidur yang membuat seseorang kesulitan untuk mulai tidur, tetap tidur, atau mendapatkan tidur yang terasa cukup. Kualitas dan kuantitas tidur sama-sama berperan dalam istirahat yang baik.</p>
                <p>Kesulitan tidur yang berulang dapat memengaruhi suasana hati, konsentrasi, daya ingat, dan energi sepanjang hari. Pada remaja, rutinitas sekolah, perubahan keseharian, stres, serta penggunaan gawai dapat ikut memengaruhi pola tidur.</p>
                <p>Setiap orang dapat mengalami masalah tidur sesekali. Jika keluhan berlangsung terus-menerus atau mengganggu aktivitas, bicarakan dengan orang dewasa tepercaya dan tenaga kesehatan.</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 sm:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Mulai dari yang sederhana</span>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-4 sm:text-4xl">Bangun rutinitas tidur yang baik</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600 sm:mt-4 sm:text-base sm:leading-7">Beberapa perubahan kecil dapat membantu tubuh bersiap untuk beristirahat.</p>
            </div>
            <div class="mt-8 grid gap-0 divide-y divide-slate-200 border-y border-slate-200 sm:mt-12 sm:grid-cols-2 sm:gap-5 sm:divide-y-0 sm:border-0 xl:grid-cols-4">
                <article class="flex items-start gap-3 py-4 sm:block sm:rounded-3xl sm:border sm:border-slate-200 sm:bg-slate-50 sm:p-6 sm:transition sm:hover:-translate-y-1 sm:hover:border-blue-200 sm:hover:shadow-lg sm:hover:shadow-blue-900/5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-lg text-blue-700 sm:h-12 sm:w-12 sm:rounded-2xl sm:text-xl">☕</span>
                    <div><h3 class="text-base font-extrabold text-slate-900 sm:mt-5 sm:text-lg">Batasi stimulan</h3>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Kurangi kafein, alkohol, dan nikotin, terutama menjelang waktu tidur.</p></div>
                </article>
                <article class="flex items-start gap-3 py-4 sm:block sm:rounded-3xl sm:border sm:border-slate-200 sm:bg-slate-50 sm:p-6 sm:transition sm:hover:-translate-y-1 sm:hover:border-blue-200 sm:hover:shadow-lg sm:hover:shadow-blue-900/5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-lg text-indigo-700 sm:h-12 sm:w-12 sm:rounded-2xl sm:text-xl">🥗</span>
                    <div><h3 class="text-base font-extrabold text-slate-900 sm:mt-5 sm:text-lg">Pilih makan malam ringan</h3>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Hindari makan berat atau minum terlalu banyak sesaat sebelum tidur.</p></div>
                </article>
                <article class="flex items-start gap-3 py-4 sm:block sm:rounded-3xl sm:border sm:border-slate-200 sm:bg-slate-50 sm:p-6 sm:transition sm:hover:-translate-y-1 sm:hover:border-blue-200 sm:hover:shadow-lg sm:hover:shadow-blue-900/5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-100 text-lg text-sky-700 sm:h-12 sm:w-12 sm:rounded-2xl sm:text-xl">🏃</span>
                    <div><h3 class="text-base font-extrabold text-slate-900 sm:mt-5 sm:text-lg">Tetap aktif</h3>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Lakukan olahraga secara teratur dan beri jeda sebelum waktu istirahat.</p></div>
                </article>
                <article class="flex items-start gap-3 py-4 sm:block sm:rounded-3xl sm:border sm:border-slate-200 sm:bg-slate-50 sm:p-6 sm:transition sm:hover:-translate-y-1 sm:hover:border-blue-200 sm:hover:shadow-lg sm:hover:shadow-blue-900/5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-violet-100 text-lg text-violet-700 sm:h-12 sm:w-12 sm:rounded-2xl sm:text-xl">🌙</span>
                    <div><h3 class="text-base font-extrabold text-slate-900 sm:mt-5 sm:text-lg">Jaga jadwal tidur</h3>
                    <p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Usahakan tidur dan bangun pada waktu yang serupa setiap hari.</p></div>
                </article>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-12 sm:px-8 sm:py-20 lg:py-24">
        <div class="grid items-center gap-6 lg:grid-cols-2 lg:gap-10">
            <div class="rounded-2xl bg-blue-50 p-5 sm:rounded-[2rem] sm:p-10">
                <span class="inline-flex rounded-full bg-white px-3 py-1.5 text-xs font-bold text-blue-700 shadow-sm">Dua pola yang umum</span>
                <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-5 sm:text-3xl">Kenali jenis gangguan tidur</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600 sm:mt-4 sm:text-base">Insomnia dapat berlangsung dalam waktu singkat atau menetap lebih lama. Memahami pola dan pemicunya dapat menjadi langkah awal untuk mencari dukungan yang sesuai.</p>
                <a href="{{ route('medical') }}" class="mt-5 inline-flex items-center gap-2 rounded-full bg-blue-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800 sm:mt-7">Pelajari masalah medis <span aria-hidden="true">→</span></a>
            </div>
            <div class="space-y-4">
                <article class="flex gap-3 border-b border-slate-200 py-4 first:border-t sm:gap-5 sm:rounded-3xl sm:border sm:bg-white sm:p-6 sm:shadow-sm">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-sm font-extrabold text-amber-700 sm:h-12 sm:w-12 sm:rounded-2xl">01</span>
                    <div><h3 class="font-extrabold text-slate-900">Insomnia akut</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Gangguan tidur jangka pendek yang dapat muncul selama beberapa hari atau minggu, misalnya saat ada stres atau perubahan rutinitas.</p></div>
                </article>
                <article class="flex gap-3 border-b border-slate-200 py-4 sm:gap-5 sm:rounded-3xl sm:border sm:bg-white sm:p-6 sm:shadow-sm">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-sm font-extrabold text-indigo-700 sm:h-12 sm:w-12 sm:rounded-2xl">02</span>
                    <div><h3 class="font-extrabold text-slate-900">Insomnia kronis</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-2">Masalah tidur jangka panjang yang dapat berulang. Pertimbangkan untuk berkonsultasi bila keluhan sering muncul dan mengganggu aktivitas.</p></div>
                </article>
            </div>
        </div>
    </section>

    <section class="mx-4 mb-12 overflow-hidden rounded-2xl bg-slate-900 sm:mx-8 sm:mb-20 sm:rounded-[2rem] lg:mx-auto lg:mb-28 lg:max-w-7xl">
        <div class="relative grid items-center gap-5 px-5 py-6 sm:gap-8 sm:px-12 sm:py-14 lg:grid-cols-[1fr_auto] lg:px-16">
            <div class="absolute -right-20 -top-28 h-80 w-80 rounded-full bg-blue-700/30 blur-3xl"></div>
            <div class="relative max-w-2xl">
                <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-300">Langkah pertama</p>
                <h2 class="mt-2 text-xl font-extrabold tracking-tight text-white sm:mt-3 sm:text-3xl">Ingin mengenali pola tidurmu?</h2>
                <p class="mt-2 text-sm leading-6 text-slate-300 sm:mt-3 sm:leading-7">Isi screening singkat dan gunakan hasilnya sebagai bahan refleksi atau percakapan dengan tenaga kesehatan.</p>
            </div>
            <a href="{{ route('screening') }}" class="relative inline-flex w-full items-center justify-center gap-2 rounded-full bg-blue-600 px-6 py-3 text-sm font-extrabold text-white transition hover:bg-blue-500 sm:w-auto sm:py-3.5">Mulai screening <span aria-hidden="true">→</span></a>
        </div>
    </section>
@endsection
