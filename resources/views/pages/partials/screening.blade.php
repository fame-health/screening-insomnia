<div class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/5" data-screening data-score-mode="{{ $scoreMode }}">
    <div class="border-b border-slate-100 bg-white px-6 py-5 sm:px-8">
        <div class="flex items-center justify-between gap-4">
            <div><p class="text-xs font-extrabold uppercase tracking-[0.15em] text-blue-700">Screening mandiri</p><p class="mt-1 text-sm font-semibold text-slate-600" data-step-label>Langkah 1 dari 2 · Biodata</p></div>
            <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700" data-progress>1 / 2</span>
        </div>
        <div class="mt-4 h-1.5 overflow-hidden rounded-full bg-slate-100"><div class="h-full w-1/2 rounded-full bg-blue-600 transition-all duration-300" data-progress-bar></div></div>
    </div>

    <section class="p-6 sm:p-8" data-screening-step="bio">
        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Masukkan biodata</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">Data ini hanya digunakan untuk menampilkan ringkasan di halaman ini.</p>
        <form class="mt-7 space-y-5" data-bio-form>
            <div>
                <label for="screening-nama-{{ $scoreMode }}" class="mb-2 block text-sm font-bold text-slate-700">Nama</label>
                <input id="screening-nama-{{ $scoreMode }}" name="nama" type="text" autocomplete="name" required maxlength="80" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Masukkan nama">
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="screening-umur-{{ $scoreMode }}" class="mb-2 block text-sm font-bold text-slate-700">Umur</label>
                    <div class="relative"><input id="screening-umur-{{ $scoreMode }}" name="umur" type="number" min="10" max="25" inputmode="numeric" required class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 pr-16 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Contoh: 17"><span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sm text-slate-400">tahun</span></div>
                </div>
                <fieldset>
                    <legend class="mb-2 block text-sm font-bold text-slate-700">Jenis kelamin</legend>
                    <div class="flex h-[50px] flex-wrap items-center gap-x-5 gap-y-2 rounded-xl border border-slate-300 px-4">
                        <label class="inline-flex cursor-pointer items-center gap-2 text-sm text-slate-700"><input class="h-4 w-4 accent-blue-700" type="radio" name="gender" value="Perempuan" required> Perempuan</label>
                        <label class="inline-flex cursor-pointer items-center gap-2 text-sm text-slate-700"><input class="h-4 w-4 accent-blue-700" type="radio" name="gender" value="Laki-laki" required> Laki-laki</label>
                    </div>
                </fieldset>
            </div>
            <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-blue-50 p-4 text-xs leading-5 text-blue-900">
                <input class="mt-0.5 h-4 w-4 shrink-0 accent-blue-700" type="checkbox" name="consent" value="1" required>
                <span>Saya memahami bahwa biodata dan jawaban screening akan disimpan sebagai rekap internal pengelola.</span>
            </label>
            <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3.5 text-sm font-extrabold text-white shadow-lg shadow-blue-700/20 transition hover:bg-blue-800 sm:w-auto">Lanjutkan ke pertanyaan <span aria-hidden="true">→</span></button>
        </form>
    </section>

    <section class="hidden p-6 sm:p-8" data-screening-step="questions" hidden>
        <div class="mb-7"><h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Screening insomnia</h2><p class="mt-2 text-sm leading-6 text-slate-600">Pilih satu jawaban untuk setiap pertanyaan.</p></div>
        <form class="space-y-4" data-quiz-form method="POST" action="{{ $scoreMode === 'quality' ? route('medical.screening.store') : route('screening.store') }}">
            @csrf
            <input type="hidden" name="participant_name" data-participant-name>
            <input type="hidden" name="age" data-participant-age>
            <input type="hidden" name="gender" data-participant-gender>
            <input type="hidden" name="consent" value="1">
            @foreach($questions as $questionIndex => $question)
                <fieldset class="rounded-2xl border border-slate-200 p-5 sm:p-6">
                    <legend class="max-w-full px-2 text-sm font-extrabold leading-6 text-slate-900 sm:text-base">{{ $questionIndex + 1 }}. {{ $question->question_text }}</legend>
                    <div class="mt-3 grid gap-2 sm:grid-cols-2">
                        @foreach($question->options as $optionIndex => $option)
                            <label class="group flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 px-4 py-3 text-sm leading-6 text-slate-600 transition hover:border-blue-300 hover:bg-blue-50/60 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50 has-[:checked]:text-blue-900">
                                <input class="mt-1 h-4 w-4 shrink-0 accent-blue-700" type="radio" name="answers[{{ $question->id }}]" value="{{ $optionIndex }}" required>
                                <span>{{ $option['label'] }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
            <p class="rounded-xl bg-blue-50 px-4 py-3 text-xs leading-5 text-blue-900">Biodata dan jawaban akan disimpan di database project ini agar pengelola dapat melihat rekap screening. Hasil bukan diagnosis medis.</p>
            <p class="hidden rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm leading-6 text-rose-800" data-screening-error role="alert"></p>
            <div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-between">
                <button type="button" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50" data-back-to-bio>← Kembali ke biodata</button>
                <button type="submit" class="rounded-xl bg-blue-700 px-6 py-3 text-sm font-extrabold text-white shadow-lg shadow-blue-700/20 transition hover:bg-blue-800">Lihat ringkasan hasil</button>
            </div>
        </form>
    </section>

    <section class="hidden p-6 sm:p-8" data-screening-step="result" hidden aria-live="polite">
        <div class="text-center">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700"><svg viewBox="0 0 24 24" class="h-7 w-7" fill="none" aria-hidden="true"><path d="m5 12 4.5 4.5L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.15em] text-blue-700">Ringkasan screening</p>
            <h2 class="mt-2 text-2xl font-extrabold tracking-tight text-slate-900">Hasil jawabanmu</h2>
        </div>
        <div class="mt-7 rounded-2xl bg-slate-50 p-5">
            <div class="flex flex-wrap items-start justify-between gap-5">
                <div><p class="text-sm font-semibold text-slate-500">Nama</p><p class="mt-1 font-bold text-slate-900" data-result-name></p><p class="mt-3 text-sm font-semibold text-slate-500">Umur &amp; jenis kelamin</p><p class="mt-1 text-sm font-bold text-slate-900"><span data-result-age></span> tahun · <span data-result-gender></span></p></div>
                <div class="min-w-32 rounded-2xl bg-white px-5 py-4 text-center shadow-sm"><p class="text-xs font-bold uppercase tracking-wide text-slate-500">Skor</p><p class="mt-1 text-3xl font-extrabold text-blue-700"><span data-result-score></span><span class="text-base">/100</span></p></div>
            </div>
        </div>
        <div class="mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-5"><h3 class="font-extrabold text-slate-900" data-result-heading>Catatan</h3><p class="mt-2 text-sm leading-7 text-slate-700" data-result-copy></p></div>
        <p class="mt-5 text-xs leading-6 text-slate-500">Ringkasan ini menggambarkan jawaban yang Anda pilih, bukan diagnosis. Jika kesulitan tidur berlangsung lama atau memengaruhi kegiatan, konsultasikan dengan tenaga kesehatan.</p>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-center">
            <button type="button" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50" data-restart-screening>Ulangi screening</button>
            <a href="{{ route('home') }}" class="rounded-xl bg-blue-700 px-5 py-3 text-center text-sm font-extrabold text-white transition hover:bg-blue-800">Kembali ke beranda</a>
        </div>
    </section>
</div>
