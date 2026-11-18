@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="relative isolate overflow-hidden bg-blue-700 text-white">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,_rgba(147,197,253,0.38),_transparent_42%),linear-gradient(125deg,_#123c9c,_#1d4ed8_55%,_#2563eb)]"></div>
        <div class="absolute -right-20 top-12 -z-10 h-80 w-80 rounded-full border border-white/10 sm:right-8 sm:top-0 sm:h-[30rem] sm:w-[30rem]"></div>
        <div class="absolute -right-8 top-24 -z-10 h-60 w-60 rounded-full border border-white/10 sm:right-20 sm:top-12 sm:h-96 sm:w-96"></div>
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 py-20 sm:px-8 sm:py-28 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16 lg:py-32">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-blue-100">
                    <span class="h-2 w-2 rounded-full bg-sky-300"></span> Kenali kualitas tidurmu
                </span>
                <h1 class="mt-7 text-4xl font-extrabold leading-[1.08] tracking-tight sm:text-5xl lg:text-6xl">Tidur lebih baik,<br class="hidden sm:block"> jalani hari dengan <span class="text-sky-200">lebih baik.</span></h1>
                <p class="mt-6 max-w-xl text-base leading-8 text-blue-100 sm:text-lg">Pahami insomnia, kenali kebiasaan tidur, dan temukan langkah sederhana untuk menjaga istirahat yang lebih berkualitas.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('screening') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3.5 text-sm font-extrabold text-blue-800 shadow-xl shadow-blue-950/20 transition hover:-translate-y-0.5 hover:bg-blue-50">
                        Mulai screening
                        <svg viewBox="0 0 20 20" class="h-4 w-4" fill="none" aria-hidden="true"><path d="M4 10h12m-5-5 5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="#tentang-insomnia" class="inline-flex items-center justify-center rounded-full border border-white/30 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-white/10">Pelajari insomnia</a>
                </div>
                <p class="mt-5 text-xs text-blue-100/80">Screening ini untuk informasi awal dan tidak menggantikan konsultasi tenaga kesehatan.</p>
            </div>

            <div class="relative mx-auto w-full max-w-lg">
                <div class="absolute -left-6 top-14 h-24 w-24 rounded-3xl bg-sky-300/20 blur-xl"></div>
                <div class="relative rounded-[2rem] border border-white/20 bg-white/10 p-4 shadow-2xl shadow-blue-950/30 backdrop-blur-sm sm:p-6">
                    <div class="rounded-[1.5rem] bg-white p-6 text-slate-800 sm:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold text-slate-500">Ruang istirahat</p>
                                <p class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900">Tenangkan malammu</p>
                            </div>
                            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-blue-700">
                                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M4 18V9m0 5h16v4M4 11h7a3 3 0 0 1 3 3m0-3h3a3 3 0 0 1 3 3M4 18h16M7 9V6h4v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        </div>
                        <div class="mt-7 flex items-center gap-5 rounded-2xl bg-blue-50 p-5">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-blue-700 text-white">
                                <svg viewBox="0 0 24 24" class="h-8 w-8" fill="none" aria-hidden="true"><path d="M19.2 15.7A8 8 0 0 1 8.3 4.8a8.1 8.1 0 1 0 10.9 10.9Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><path d="m16.8 5.2.5 1.4 1.4.5-1.4.5-.5 1.4-.5-1.4-1.4-.5 1.4-.5.5-1.4Z" fill="currentColor"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">Kebiasaan kecil, dampak berarti</p>
                                <p class="mt-1 text-sm leading-6 text-slate-600">Rutinitas yang teratur membantu tubuh mengenali waktu istirahat.</p>
                            </div>
                        </div>
                        <div class="mt-6 space-y-3">
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

    <section id="tentang-insomnia" class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-28">
        <div class="grid gap-12 lg:grid-cols-[0.75fr_1.25fr] lg:gap-20">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kenali lebih dekat</span>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Apa itu insomnia?</h2>
                <div class="mt-6 h-1.5 w-16 rounded-full bg-blue-600"></div>
                <a href="{{ route('medical') }}" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-blue-700 transition hover:text-blue-900">Lihat dampak pada kesehatan <span aria-hidden="true">→</span></a>
            </div>
            <div class="space-y-5 text-base leading-8 text-slate-600">
                <p>Insomnia adalah gangguan tidur yang membuat seseorang kesulitan untuk mulai tidur, tetap tidur, atau mendapatkan tidur yang terasa cukup. Kualitas dan kuantitas tidur sama-sama berperan dalam istirahat yang baik.</p>
                <p>Kesulitan tidur yang berulang dapat memengaruhi suasana hati, konsentrasi, daya ingat, dan energi sepanjang hari. Pada remaja, rutinitas sekolah, perubahan keseharian, stres, serta penggunaan gawai dapat ikut memengaruhi pola tidur.</p>
                <p>Setiap orang dapat mengalami masalah tidur sesekali. Jika keluhan berlangsung terus-menerus atau mengganggu aktivitas, bicarakan dengan orang dewasa tepercaya dan tenaga kesehatan.</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-5 sm:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Mulai dari yang sederhana</span>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Bangun rutinitas tidur yang baik</h2>
                <p class="mt-4 text-base leading-7 text-slate-600">Beberapa perubahan kecil dapat membantu tubuh bersiap untuk beristirahat.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-xl text-blue-700">☕</span>
                    <h3 class="mt-5 text-lg font-extrabold text-slate-900">Batasi stimulan</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Kurangi kafein, alkohol, dan nikotin, terutama menjelang waktu tidur.</p>
                </article>
                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-xl text-indigo-700">🥗</span>
                    <h3 class="mt-5 text-lg font-extrabold text-slate-900">Pilih makan malam ringan</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Hindari makan berat atau minum terlalu banyak sesaat sebelum tidur.</p>
                </article>
                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-100 text-xl text-sky-700">🏃</span>
                    <h3 class="mt-5 text-lg font-extrabold text-slate-900">Tetap aktif</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Lakukan olahraga secara teratur dan beri jeda sebelum waktu istirahat.</p>
                </article>
                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-100 text-xl text-violet-700">🌙</span>
                    <h3 class="mt-5 text-lg font-extrabold text-slate-900">Jaga jadwal tidur</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Usahakan tidur dan bangun pada waktu yang serupa setiap hari.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-20 sm:px-8 lg:py-24">
        <div class="grid items-center gap-10 lg:grid-cols-2">
            <div class="rounded-[2rem] bg-blue-50 p-8 sm:p-10">
                <span class="inline-flex rounded-full bg-white px-3 py-1.5 text-xs font-bold text-blue-700 shadow-sm">Dua pola yang umum</span>
                <h2 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900">Kenali jenis gangguan tidur</h2>
                <p class="mt-4 leading-7 text-slate-600">Insomnia dapat berlangsung dalam waktu singkat atau menetap lebih lama. Memahami pola dan pemicunya dapat menjadi langkah awal untuk mencari dukungan yang sesuai.</p>
                <a href="{{ route('medical') }}" class="mt-7 inline-flex items-center gap-2 rounded-full bg-blue-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800">Pelajari masalah medis <span aria-hidden="true">→</span></a>
            </div>
            <div class="space-y-4">
                <article class="flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-100 font-extrabold text-amber-700">01</span>
                    <div><h3 class="font-extrabold text-slate-900">Insomnia akut</h3><p class="mt-2 text-sm leading-6 text-slate-600">Gangguan tidur jangka pendek yang dapat muncul selama beberapa hari atau minggu, misalnya saat ada stres atau perubahan rutinitas.</p></div>
                </article>
                <article class="flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 font-extrabold text-indigo-700">02</span>
                    <div><h3 class="font-extrabold text-slate-900">Insomnia kronis</h3><p class="mt-2 text-sm leading-6 text-slate-600">Masalah tidur jangka panjang yang dapat berulang. Pertimbangkan untuk berkonsultasi bila keluhan sering muncul dan mengganggu aktivitas.</p></div>
                </article>
            </div>
        </div>
    </section>

    <section class="mx-5 mb-20 overflow-hidden rounded-[2rem] bg-slate-900 sm:mx-8 lg:mx-auto lg:mb-28 lg:max-w-7xl">
        <div class="relative grid items-center gap-8 px-7 py-10 sm:px-12 sm:py-14 lg:grid-cols-[1fr_auto] lg:px-16">
            <div class="absolute -right-20 -top-28 h-80 w-80 rounded-full bg-blue-700/30 blur-3xl"></div>
            <div class="relative max-w-2xl">
                <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-300">Langkah pertama</p>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Ingin mengenali pola tidurmu?</h2>
                <p class="mt-3 text-sm leading-7 text-slate-300">Isi screening singkat dan gunakan hasilnya sebagai bahan refleksi atau percakapan dengan tenaga kesehatan.</p>
            </div>
            <a href="{{ route('screening') }}" class="relative inline-flex items-center justify-center gap-2 rounded-full bg-blue-600 px-6 py-3.5 text-sm font-extrabold text-white transition hover:bg-blue-500">Mulai screening <span aria-hidden="true">→</span></a>
        </div>
    </section>
@endsection
