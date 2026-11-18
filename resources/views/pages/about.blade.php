@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Tentang proyek</p>
            <div class="mt-4 grid gap-7 lg:grid-cols-[1fr_0.65fr] lg:items-end">
                <div><h1 class="max-w-3xl text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Membuka percakapan tentang tidur yang sehat.</h1><p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">Kami menghadirkan informasi dasar mengenai insomnia remaja dan alat screening edukatif yang mudah digunakan.</p></div>
                <div class="rounded-3xl border border-blue-100 bg-white p-5 shadow-sm"><p class="text-sm font-bold text-slate-900">Dikembangkan sebagai proyek edukasi</p><p class="mt-2 text-sm leading-6 text-slate-600">Berkaitan dengan mata kuliah Screening Insomnia Remaja di Institut Kesehatan Payung Negeri Pekanbaru.</p></div>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-12 px-5 py-16 sm:px-8 sm:py-20 lg:grid-cols-[0.7fr_1.3fr] lg:gap-20">
        <div>
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-blue-700"><svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M4 19.5V5.8A1.8 1.8 0 0 1 5.8 4H20v15H5.8A1.8 1.8 0 0 0 4 20.8m0-1.3a1.8 1.8 0 0 1 1.8-1.8H20M8 8h8M8 12h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <h2 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900">Latar belakang</h2>
            <p class="mt-4 text-sm leading-7 text-slate-500">Informasi tidur yang mudah dipahami dapat membantu remaja mengenali kebiasaan dan mencari dukungan saat dibutuhkan.</p>
        </div>
        <div class="space-y-5 text-base leading-8 text-slate-600">
            <p>Insomnia merupakan gangguan tidur yang membuat seseorang sulit mulai tidur, tetap tidur, atau mendapatkan istirahat yang cukup. Tidur berkualitas berkaitan dengan kedalaman tidur dan rasa segar setelah bangun, sementara kuantitas tidur berkaitan dengan lama waktu tidur.</p>
            <p>Keluhan tidur yang berkepanjangan dapat memengaruhi energi, konsentrasi, suasana hati, dan aktivitas sehari-hari. Pada remaja, faktor seperti jadwal sekolah, stres, perubahan rutinitas, dan penggunaan media sosial dapat ikut memengaruhi pola istirahat.</p>
            <p>Melalui situs ini, pengunjung dapat membaca informasi umum tentang insomnia, mengenal kebiasaan tidur yang sehat, dan mencoba screening sederhana sebagai bahan refleksi.</p>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 md:grid-cols-3">
            <article class="rounded-3xl border border-slate-200 p-7"><span class="text-sm font-extrabold text-blue-700">01 / INFORMASI</span><h3 class="mt-4 text-xl font-extrabold text-slate-900">Kenali pola tidur</h3><p class="mt-3 text-sm leading-7 text-slate-600">Pelajari pengertian insomnia, jenis, dan hal-hal yang dapat memengaruhi tidur.</p></article>
            <article class="rounded-3xl border border-slate-200 p-7"><span class="text-sm font-extrabold text-blue-700">02 / REFLEKSI</span><h3 class="mt-4 text-xl font-extrabold text-slate-900">Coba screening edukatif</h3><p class="mt-3 text-sm leading-7 text-slate-600">Jawab pertanyaan singkat untuk melihat ringkasan jawaban tentang kebiasaan tidurmu.</p></article>
            <article class="rounded-3xl border border-slate-200 p-7"><span class="text-sm font-extrabold text-blue-700">03 / DUKUNGAN</span><h3 class="mt-4 text-xl font-extrabold text-slate-900">Cari bantuan yang sesuai</h3><p class="mt-3 text-sm leading-7 text-slate-600">Bicarakan keluhan yang mengganggu dengan orang tepercaya dan tenaga kesehatan.</p></article>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
        <div class="rounded-[2rem] border border-amber-200 bg-amber-50 p-7 sm:p-10">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-amber-700"><svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M12 8v4m0 4h.01M10.3 3.9 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.1a2 2 0 0 0-3.4 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <div><h2 class="text-xl font-extrabold text-slate-900">Catatan penting</h2><p class="mt-3 max-w-4xl text-sm leading-7 text-slate-700">Situs ini dibuat untuk tujuan edukasi dalam rangka proyek mata kuliah “Screening Insomnia Remaja”. Isi screening bukan alat diagnosis dan hasilnya tidak menggantikan pemeriksaan, saran, atau perawatan dari tenaga kesehatan.</p></div>
            </div>
        </div>
        <div class="mt-10 flex flex-col justify-between gap-5 rounded-3xl bg-blue-700 p-7 text-white sm:flex-row sm:items-center sm:p-9">
            <div><h2 class="text-xl font-extrabold">Ada pertanyaan tentang proyek ini?</h2><p class="mt-2 text-sm text-blue-100">Kami siap menerima pesan melalui halaman kontak.</p></div>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-bold text-blue-800 transition hover:bg-blue-50">Hubungi kami <span class="ml-2" aria-hidden="true">→</span></a>
        </div>
    </section>
@endsection
