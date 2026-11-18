@php($adminLoginUrl = \Filament\Facades\Filament::getPanel('admin')->getLoginUrl())
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4f8ff">
    <meta name="color-scheme" content="light">
    <meta name="application-name" content="Insomnia Remaja">
    <meta name="robots" content="{{ app()->environment('production') ? 'index, follow, max-image-preview:large' : 'noindex, nofollow' }}">
    <meta name="description" content="@yield('meta_description', 'Informasi edukatif tentang insomnia, kebiasaan tidur sehat, dan screening kualitas tidur remaja.')">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="48x48" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" sizes="180x180">
    <title>@yield('title', 'Edukasi Tidur Remaja') | Insomnia Remaja</title>

    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Insomnia Remaja">
    <meta property="og:title" content="@yield('title', 'Edukasi Tidur Remaja') | Insomnia Remaja">
    <meta property="og:description" content="@yield('meta_description', 'Informasi edukatif tentang insomnia, kebiasaan tidur sehat, dan screening kualitas tidur remaja.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-insomnia-remaja.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Insomnia Remaja — edukasi tidur dan screening kualitas tidur remaja">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Edukasi Tidur Remaja') | Insomnia Remaja">
    <meta name="twitter:description" content="@yield('meta_description', 'Informasi edukatif tentang insomnia, kebiasaan tidur sehat, dan screening kualitas tidur remaja.')">
    <meta name="twitter:image" content="{{ asset('images/og-insomnia-remaja.png') }}">
    <meta name="twitter:image:alt" content="Insomnia Remaja — edukasi tidur dan screening kualitas tidur remaja">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if(request()->routeIs('home'))
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Insomnia Remaja',
                'alternateName' => 'Edukasi dan Screening Tidur Remaja',
                'url' => url('/'),
                'inLanguage' => 'id-ID',
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
        </script>
    @endif
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">
    <a href="#konten" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-xl focus:bg-white focus:px-4 focus:py-3 focus:font-semibold focus:text-blue-700 focus:shadow-lg">Lewati ke konten</a>

    <div class="border-b border-blue-100 bg-blue-50/80">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-x-6 gap-y-1 px-4 py-2 text-xs font-medium text-slate-600 sm:px-8 sm:py-2.5">
            <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-blue-500"></span> Ruang informasi tidur yang lebih sehat</span>
            <a class="hidden transition hover:text-blue-700 sm:inline" href="mailto:admin@screeninginsomniaremaja.com">admin@screeninginsomniaremaja.com</a>
        </div>
    </div>

    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-8 sm:py-4">
            <a href="{{ route('home') }}" class="group flex items-center gap-2.5 sm:gap-3" aria-label="Insomnia Remaja, beranda">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-700 text-white shadow-lg shadow-blue-700/20 transition group-hover:-rotate-3 sm:h-11 sm:w-11 sm:rounded-2xl">
                    <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" aria-hidden="true"><path d="M19.2 15.7A8 8 0 0 1 8.3 4.8a8.1 8.1 0 1 0 10.9 10.9Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="m16.8 5.2.5 1.4 1.4.5-1.4.5-.5 1.4-.5-1.4-1.4-.5 1.4-.5.5-1.4Z" fill="currentColor"/></svg>
                </span>
                <span>
                    <span class="block text-base font-extrabold tracking-tight text-slate-900">Insomnia<span class="text-blue-700">Remaja</span></span>
                    <span class="block text-[11px] font-medium tracking-wide text-slate-500">EDUKASI &amp; KUALITAS TIDUR</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 lg:flex" aria-label="Navigasi utama">
                <a href="{{ route('home') }}" @class(['rounded-full px-4 py-2 text-sm font-semibold transition', 'bg-blue-50 text-blue-700' => request()->routeIs('home'), 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>Beranda</a>
                <a href="{{ route('medical') }}" @class(['rounded-full px-4 py-2 text-sm font-semibold transition', 'bg-blue-50 text-blue-700' => request()->routeIs('medical'), 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !request()->routeIs('medical')]) @if(request()->routeIs('medical')) aria-current="page" @endif>Masalah Medis</a>
                <a href="{{ route('screening') }}" @class(['rounded-full px-4 py-2 text-sm font-semibold transition', 'bg-blue-50 text-blue-700' => request()->routeIs('screening'), 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !request()->routeIs('screening')]) @if(request()->routeIs('screening')) aria-current="page" @endif>Screening</a>
                <a href="{{ route('about') }}" @class(['rounded-full px-4 py-2 text-sm font-semibold transition', 'bg-blue-50 text-blue-700' => request()->routeIs('about'), 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !request()->routeIs('about')]) @if(request()->routeIs('about')) aria-current="page" @endif>Tentang</a>
                <a href="{{ route('contact') }}" @class(['ml-2 rounded-full px-5 py-2.5 text-sm font-bold transition', 'bg-blue-700 text-white shadow-md shadow-blue-700/20 hover:bg-blue-800' => request()->routeIs('contact'), 'bg-slate-900 text-white hover:bg-blue-800' => !request()->routeIs('contact')])>Kontak</a>
                <a href="{{ $adminLoginUrl }}" class="ml-1 inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-4 py-2.5 text-sm font-bold text-blue-700 transition hover:border-blue-300 hover:bg-blue-100">
                    <svg viewBox="0 0 20 20" class="h-4 w-4" fill="none" aria-hidden="true"><path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.5 6.5a5.5 5.5 0 0 1 11 0M15 7h3m-1.5-1.5v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Login Admin
                </a>
            </nav>

            <button type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 sm:h-11 sm:w-11 lg:hidden" aria-label="Buka menu" aria-expanded="false" aria-controls="menu-mobile" data-menu-toggle>
                <svg data-menu-open-icon viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                <svg data-menu-close-icon viewBox="0 0 24 24" class="hidden h-5 w-5" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </button>
        </div>
        <nav id="menu-mobile" class="hidden border-t border-slate-100 bg-white px-4 py-2 lg:hidden" aria-label="Navigasi seluler" data-mobile-menu>
            <div class="mx-auto grid max-w-7xl gap-1 sm:px-3">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">Beranda</a>
                <a href="{{ route('medical') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">Masalah Medis</a>
                <a href="{{ route('screening') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">Screening Insomnia</a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">Kontak</a>
                <a href="{{ $adminLoginUrl }}" class="mt-1 inline-flex items-center gap-2 rounded-lg border-t border-slate-100 px-3 py-3 text-sm font-bold text-blue-700 hover:bg-blue-50">
                    <svg viewBox="0 0 20 20" class="h-4 w-4" fill="none" aria-hidden="true"><path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.5 6.5a5.5 5.5 0 0 1 11 0M15 7h3m-1.5-1.5v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    Login Admin
                </a>
            </div>
        </nav>
    </header>

    <main id="konten">
        @yield('content')
    </main>

    <footer class="mt-12 bg-slate-950 text-slate-300 sm:mt-20">
        <div class="mx-auto grid max-w-7xl gap-7 px-5 py-9 sm:gap-10 sm:px-8 sm:py-14 md:grid-cols-[1.3fr_1fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 text-white">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" aria-hidden="true"><path d="M19.2 15.7A8 8 0 0 1 8.3 4.8a8.1 8.1 0 1 0 10.9 10.9Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </span>
                    <span class="font-extrabold">Insomnia<span class="text-blue-400">Remaja</span></span>
                </a>
                <p class="mt-3 max-w-sm text-sm leading-6 text-slate-400 sm:mt-4 sm:leading-7">Temukan informasi sederhana tentang insomnia dan kebiasaan tidur yang mendukung keseharian remaja.</p>
            </div>
            <div>
                <h2 class="text-sm font-bold text-white">Jelajahi</h2>
                <ul class="mt-3 space-y-2 text-sm text-slate-400 sm:mt-4 sm:space-y-3">
                    <li><a class="transition hover:text-white" href="{{ route('home') }}">Beranda</a></li>
                    <li><a class="transition hover:text-white" href="{{ route('medical') }}">Masalah medis</a></li>
                    <li><a class="transition hover:text-white" href="{{ route('screening') }}">Screening insomnia</a></li>
                    <li><a class="transition hover:text-white" href="{{ route('about') }}">Tentang kami</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-sm font-bold text-white">Hubungi kami</h2>
                <ul class="mt-3 space-y-2 text-sm text-slate-400 sm:mt-4 sm:space-y-3">
                    <li><a class="transition hover:text-white" href="mailto:admin@screeninginsomniaremaja.com">admin@screeninginsomniaremaja.com</a></li>
                    <li><a class="transition hover:text-white" href="https://wa.me/6282383006989">WhatsApp: +62 823-8300-6989</a></li>
                    <li><a class="transition hover:text-white" href="{{ route('contact') }}">Kirim pesan</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-4 text-xs leading-5 text-slate-500 sm:px-8 sm:py-5 md:flex-row md:items-center md:justify-between">
                <p>&copy; {{ date('Y') }} Screening Insomnia Remaja.</p>
                <p>Informasi pada situs ini bersifat edukatif dan bukan pengganti diagnosis tenaga kesehatan.</p>
            </div>
        </div>
    </footer>
</body>
</html>
