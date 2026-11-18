@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="bg-blue-50/70">
        <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
            <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-blue-700">Kami siap mendengar</p>
            <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Hubungi kami</h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">Punya pertanyaan atau masukan tentang proyek Screening Insomnia Remaja? Sampaikan melalui kontak berikut.</p>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 sm:py-16 lg:grid-cols-[0.75fr_1.25fr]">
        <div class="space-y-4">
            <a href="https://wa.me/6282383006989" class="group block rounded-3xl border border-slate-200 bg-white p-6 transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700"><svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M20 11.5a7.5 7.5 0 0 1-11.1 6.6L4 19l.9-4.6A7.5 7.5 0 1 1 20 11.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M9 8.5c.4 2.2 2.1 3.8 4.5 4.6l1-1 1.8.8-.3 1.5c-.2.7-.9 1-1.6.9-3.4-.6-6.4-3.5-7-6.9-.1-.7.2-1.4.9-1.6l1.5-.3.8 1.8-1 .2Z" fill="currentColor"/></svg></span>
                <p class="mt-5 text-xs font-bold uppercase tracking-wider text-slate-500">WhatsApp</p><h2 class="mt-1 text-lg font-extrabold text-slate-900 group-hover:text-blue-700">+62 823-8300-6989</h2><p class="mt-2 text-sm text-slate-600">Hubungi kami melalui pesan WhatsApp.</p>
            </a>
            <a href="mailto:admin@screeninginsomniaremaja.com" class="group block rounded-3xl border border-slate-200 bg-white p-6 transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-blue-700"><svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <p class="mt-5 text-xs font-bold uppercase tracking-wider text-slate-500">Email</p><h2 class="mt-1 break-all text-lg font-extrabold text-slate-900 group-hover:text-blue-700">admin@screeninginsomniaremaja.com</h2><p class="mt-2 text-sm text-slate-600">Kirim pertanyaan kapan saja.</p>
            </a>
            <div class="rounded-3xl bg-slate-900 p-6 text-white"><p class="text-sm font-extrabold">Institut Kesehatan Payung Negeri</p><p class="mt-2 text-sm leading-6 text-slate-300">Pekanbaru · Proyek edukasi kesehatan tidur remaja</p></div>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.16em] text-blue-700">Kirim pesan</p><h2 class="mt-2 text-2xl font-extrabold tracking-tight text-slate-900">Apa yang ingin disampaikan?</h2><p class="mt-2 text-sm leading-6 text-slate-600">Isi formulir ini untuk menyiapkan email di aplikasi email perangkat Anda.</p></div>
            <form class="mt-7 space-y-5" data-contact-form>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div><label for="contact-name" class="mb-2 block text-sm font-bold text-slate-700">Nama</label><input id="contact-name" name="name" type="text" autocomplete="name" required maxlength="100" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Nama Anda"></div>
                    <div><label for="contact-email" class="mb-2 block text-sm font-bold text-slate-700">Email</label><input id="contact-email" name="email" type="email" autocomplete="email" required maxlength="150" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="nama@email.com"></div>
                </div>
                <div><label for="contact-subject" class="mb-2 block text-sm font-bold text-slate-700">Subjek</label><input id="contact-subject" name="subject" type="text" required maxlength="150" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Topik pesan"></div>
                <div><label for="contact-message" class="mb-2 block text-sm font-bold text-slate-700">Pesan</label><textarea id="contact-message" name="message" rows="5" required maxlength="3000" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Tuliskan pesan Anda..."></textarea></div>
                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3.5 text-sm font-extrabold text-white shadow-lg shadow-blue-700/20 transition hover:bg-blue-800 sm:w-auto">Siapkan email <span aria-hidden="true">→</span></button>
                <p class="text-xs leading-5 text-slate-500">Pesan tidak disimpan di situs ini. Tombol akan membuka aplikasi email Anda.</p>
            </form>
        </div>
    </section>
@endsection
