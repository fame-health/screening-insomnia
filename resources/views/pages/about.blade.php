@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-9 sm:px-8 sm:py-16">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Tentang proyek</p>
            <div class="mt-3 grid gap-5 lg:mt-4 lg:grid-cols-[1fr_0.65fr] lg:items-end lg:gap-7">
                <div><h1 class="max-w-3xl text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Membuka percakapan tentang tidur yang sehat.</h1><p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:mt-5 sm:text-base sm:leading-8">Kami menghadirkan informasi dasar mengenai insomnia remaja dan alat screening edukatif yang mudah digunakan.</p></div>
                <div class="border-t border-blue-200 pt-3 lg:rounded-3xl lg:border lg:border-blue-100 lg:bg-white lg:p-5 lg:shadow-sm"><p class="text-sm font-bold text-slate-900">Dikembangkan sebagai proyek edukasi</p><p class="mt-1.5 text-sm leading-6 text-slate-600 lg:mt-2">Berkaitan dengan mata kuliah Screening Insomnia Remaja di Institut Kesehatan Payung Negeri Pekanbaru.</p></div>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-5 py-9 sm:px-8 sm:py-16 lg:grid-cols-[0.7fr_1.3fr] lg:gap-20">
        <div>
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-700 sm:h-12 sm:w-12 sm:rounded-2xl"><svg viewBox="0 0 24 24" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" aria-hidden="true"><path d="M4 19.5V5.8A1.8 1.8 0 0 1 5.8 4H20v15H5.8A1.8 1.8 0 0 0 4 20.8m0-1.3a1.8 1.8 0 0 1 1.8-1.8H20M8 8h8M8 12h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-900 sm:mt-5 sm:text-3xl">Latar belakang</h2>
            <p class="mt-2 text-sm leading-6 text-slate-500 sm:mt-4 sm:leading-7">Informasi tidur yang mudah dipahami dapat membantu remaja mengenali kebiasaan dan mencari dukungan saat dibutuhkan.</p>
        </div>
        <div class="space-y-4 text-sm leading-7 text-slate-600 sm:space-y-5 sm:text-base sm:leading-8">
            <p>Insomnia merupakan gangguan tidur yang membuat seseorang sulit mulai tidur, tetap tidur, atau mendapatkan istirahat yang cukup. Tidur berkualitas berkaitan dengan kedalaman tidur dan rasa segar setelah bangun, sementara kuantitas tidur berkaitan dengan lama waktu tidur.</p>
            <p>Keluhan tidur yang berkepanjangan dapat memengaruhi energi, konsentrasi, suasana hati, dan aktivitas sehari-hari. Pada remaja, faktor seperti jadwal sekolah, stres, perubahan rutinitas, dan penggunaan media sosial dapat ikut memengaruhi pola istirahat.</p>
            <p>Melalui situs ini, pengunjung dapat membaca informasi umum tentang insomnia, mengenal kebiasaan tidur yang sehat, dan mencoba screening sederhana sebagai bahan refleksi.</p>
        </div>
    </section>

    <section class="bg-white py-9 sm:py-16">
        <div class="mx-auto grid max-w-7xl gap-0 divide-y divide-slate-200 border-y border-slate-200 px-5 sm:px-8 md:grid-cols-3 md:gap-6 md:divide-y-0 md:border-0">
            <article class="py-4 md:rounded-3xl md:border md:border-slate-200 md:p-7"><span class="text-xs font-extrabold text-blue-700 sm:text-sm">01 / INFORMASI</span><h3 class="mt-1.5 text-base font-extrabold text-slate-900 sm:mt-4 sm:text-xl">Kenali pola tidur</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-3 sm:leading-7">Pelajari pengertian insomnia, jenis, dan hal-hal yang dapat memengaruhi tidur.</p></article>
            <article class="py-4 md:rounded-3xl md:border md:border-slate-200 md:p-7"><span class="text-xs font-extrabold text-blue-700 sm:text-sm">02 / REFLEKSI</span><h3 class="mt-1.5 text-base font-extrabold text-slate-900 sm:mt-4 sm:text-xl">Coba screening edukatif</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-3 sm:leading-7">Jawab pertanyaan singkat untuk melihat ringkasan jawaban tentang kebiasaan tidurmu.</p></article>
            <article class="py-4 md:rounded-3xl md:border md:border-slate-200 md:p-7"><span class="text-xs font-extrabold text-blue-700 sm:text-sm">03 / DUKUNGAN</span><h3 class="mt-1.5 text-base font-extrabold text-slate-900 sm:mt-4 sm:text-xl">Cari bantuan yang sesuai</h3><p class="mt-1.5 text-sm leading-6 text-slate-600 sm:mt-3 sm:leading-7">Bicarakan keluhan yang mengganggu dengan orang tepercaya dan tenaga kesehatan.</p></article>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-9 sm:px-8 sm:py-16">
        <div class="border-l-4 border-amber-300 bg-amber-50 p-4 sm:rounded-[2rem] sm:border sm:border-amber-200 sm:p-10">
            <div class="flex items-start gap-3 sm:gap-5">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-700 sm:h-12 sm:w-12 sm:rounded-2xl"><svg viewBox="0 0 24 24" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.9 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.1a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <div><h2 class="text-base font-extrabold text-slate-900 sm:text-xl">Catatan penting</h2><p class="mt-1.5 max-w-4xl text-sm leading-6 text-slate-700 sm:mt-3 sm:leading-7">Situs ini dibuat untuk tujuan edukasi dalam rangka proyek mata kuliah “Screening Insomnia Remaja”. Isi screening bukan alat diagnosis dan hasilnya tidak menggantikan pemeriksaan, saran, atau perawatan dari tenaga kesehatan.</p></div>
            </div>
        </div>
        <div class="mt-6 flex flex-col justify-between gap-4 rounded-2xl bg-blue-700 p-5 text-white sm:mt-10 sm:flex-row sm:items-center sm:gap-5 sm:rounded-3xl sm:p-9">
            <div><h2 class="text-lg font-extrabold sm:text-xl">Ada pertanyaan tentang proyek ini?</h2><p class="mt-1.5 text-sm text-blue-100 sm:mt-2">Kami siap menerima pesan melalui halaman kontak.</p></div>
            <a href="{{ route('contact') }}" class="inline-flex w-full items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-bold text-blue-800 transition hover:bg-blue-50 sm:w-auto">Hubungi kami <span class="ml-2" aria-hidden="true">→</span></a>
        </div>
    </section>
@endsection
