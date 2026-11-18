@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-9 sm:px-8 sm:py-14">
            <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-blue-700">Kami siap mendengar</p>
            <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Hubungi kami</h1>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600 sm:text-base sm:leading-8">Punya pertanyaan atau masukan tentang proyek Screening Insomnia Remaja? Kirim pesan melalui kontak berikut.</p>
        </div>
    </section>

    <section class="mx-auto grid max-w-6xl gap-8 px-5 py-8 sm:px-8 sm:py-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
        <div>
            <h2 class="text-base font-extrabold text-slate-900">Kontak langsung</h2>
            <div class="mt-3 divide-y divide-slate-200 border-y border-slate-200">
                <a href="https://wa.me/6282383006989" class="group flex items-center gap-3 py-3.5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M20 11.5a7.5 7.5 0 0 1-11.1 6.6L4 19l.9-4.6A7.5 7.5 0 1 1 20 11.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 8.5c.4 2.2 2.1 3.8 4.5 4.6l1-1 1.8.8-.3 1.5c-.2.7-.9 1-1.6.9-3.4-.6-6.4-3.5-7-6.9-.1-.7.2-1.4.9-1.6l1.5-.3.8 1.8-1 .2Z" fill="currentColor"/></svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-xs font-semibold text-slate-500">WhatsApp</span>
                        <span class="mt-0.5 block text-sm font-bold text-slate-900 group-hover:text-blue-700">+62 823-8300-6989</span>
                    </span>
                    <span class="text-lg text-slate-400 transition group-hover:translate-x-0.5 group-hover:text-blue-700" aria-hidden="true">→</span>
                </a>
                <a href="mailto:admin@screeninginsomniaremaja.com" class="group flex items-center gap-3 py-3.5">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-xs font-semibold text-slate-500">Email</span>
                        <span class="mt-0.5 block break-all text-sm font-bold text-slate-900 group-hover:text-blue-700">admin@screeninginsomniaremaja.com</span>
                    </span>
                    <span class="text-lg text-slate-400 transition group-hover:translate-x-0.5 group-hover:text-blue-700" aria-hidden="true">→</span>
                </a>
            </div>
            <p class="mt-4 text-xs leading-5 text-slate-500"><span class="font-bold text-slate-700">Institut Kesehatan Payung Negeri</span><br>Pekanbaru · Proyek edukasi kesehatan tidur remaja</p>
        </div>

        <div>
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.16em] text-blue-700">Kirim pesan</p>
                <h2 class="mt-1.5 text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">Apa yang ingin disampaikan?</h2>
                <p class="mt-1.5 text-sm leading-6 text-slate-600">Formulir ini akan menyiapkan email di aplikasi perangkat Anda.</p>
            </div>
            <form class="mt-5 space-y-4" data-contact-form>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div><label for="contact-name" class="mb-1.5 block text-sm font-bold text-slate-700">Nama</label><input id="contact-name" name="name" type="text" autocomplete="name" required maxlength="100" class="w-full rounded-lg border border-slate-300 px-3.5 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Nama Anda"></div>
                    <div><label for="contact-email" class="mb-1.5 block text-sm font-bold text-slate-700">Email</label><input id="contact-email" name="email" type="email" autocomplete="email" required maxlength="150" class="w-full rounded-lg border border-slate-300 px-3.5 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="nama@email.com"></div>
                </div>
                <div><label for="contact-subject" class="mb-1.5 block text-sm font-bold text-slate-700">Subjek</label><input id="contact-subject" name="subject" type="text" required maxlength="150" class="w-full rounded-lg border border-slate-300 px-3.5 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Topik pesan"></div>
                <div><label for="contact-message" class="mb-1.5 block text-sm font-bold text-slate-700">Pesan</label><textarea id="contact-message" name="message" rows="4" required maxlength="3000" class="w-full rounded-lg border border-slate-300 px-3.5 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Tuliskan pesan Anda..."></textarea></div>
                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-700 px-5 py-3 text-sm font-extrabold text-white transition hover:bg-blue-800 sm:w-auto">Siapkan email <span aria-hidden="true">→</span></button>
                <p class="text-xs leading-5 text-slate-500">Pesan tidak disimpan di situs. Email akan dibuka melalui aplikasi perangkat Anda.</p>
            </form>
        </div>
    </section>
@endsection
