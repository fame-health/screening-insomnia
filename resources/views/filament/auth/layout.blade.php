<x-filament-panels::layout.base :livewire="$livewire">
    <main class="ir-admin-login">
        <section class="ir-admin-login__brand" aria-label="Insomnia Remaja">
            <div class="ir-admin-login__brand-header">
                <span class="ir-admin-login__brand-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M19.2 15.7A8 8 0 0 1 8.3 4.8a8.1 8.1 0 1 0 10.9 10.9Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        <path d="m16.8 5.2.5 1.4 1.4.5-1.4.5-.5 1.4-.5-1.4-1.4-.5 1.4-.5.5-1.4Z" fill="currentColor" />
                    </svg>
                </span>
                <span class="ir-admin-login__brand-name">
                    <strong>Insomnia<span>Remaja</span></strong>
                    <small>Edukasi &amp; kualitas tidur</small>
                </span>
            </div>

            <div class="ir-admin-login__brand-copy">
                <span class="ir-admin-login__badge">Panel administrator</span>
                <h2>Kelola data dengan tenang.<br>Bangun tidur yang lebih baik.</h2>
                <p>Ruang pengelolaan informasi dan screening edukatif kualitas tidur remaja.</p>
            </div>

            <div class="ir-admin-login__scene" aria-hidden="true">
                <svg viewBox="0 0 480 350" fill="none">
                    <circle cx="280" cy="165" r="132" stroke="white" stroke-opacity=".12" />
                    <circle cx="280" cy="165" r="101" stroke="white" stroke-opacity=".1" />
                    <path d="M330 115a80 80 0 0 1-105 105 80 80 0 1 0 105-105Z" fill="#BDEBFF" />
                    <path d="m361 52 4 11 11 4-11 4-4 11-4-11-11-4 11-4 4-11ZM183 92l3 8 8 3-8 3-3 8-3-8-8-3 8-3 3-8ZM383 226l3 8 8 3-8 3-3 8-3-8-8-3 8-3 3-8Z" fill="#DDF6FF" />
                    <circle cx="129" cy="254" r="4" fill="#77D5F4" />
                    <circle cx="407" cy="130" r="3" fill="#77D5F4" />
                    <path d="M76 296c62-19 122-28 181-28 61 0 110 9 148 28" stroke="white" stroke-opacity=".2" stroke-width="2" stroke-linecap="round" />
                    <path d="M140 270v-39c0-9 7-16 16-16h145c9 0 16 7 16 16v39M124 270h207M145 270v18m165-18v18" stroke="#C8EEFF" stroke-opacity=".55" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M179 214c0-13 10-23 23-23h29c13 0 23 10 23 23v5h-75v-5Z" fill="#DDF6FF" fill-opacity=".82" />
                    <path d="M142 295h187" stroke="#77D5F4" stroke-opacity=".42" stroke-width="3" stroke-linecap="round" />
                </svg>
            </div>

            <div class="ir-admin-login__brand-footer">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 5 6v5c0 4.7 3 8.4 7 10 4-1.6 7-5.3 7-10V6l-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Akses aman untuk tim pengelola
            </div>
        </section>

        <section class="ir-admin-login__form-panel">
            <div class="ir-admin-login__form-content">
                <p class="ir-admin-login__eyebrow">Ruang administrator</p>
                <h1>Selamat datang</h1>
                <p class="ir-admin-login__intro">Masuk untuk melanjutkan ke dashboard pengelolaan Anda.</p>

                <div class="ir-admin-login__form">
                    {{ $slot }}
                </div>

                <p class="ir-admin-login__note">
                    Gunakan akun administrator yang telah terdaftar untuk mengelola data screening.
                </p>
            </div>
        </section>
    </main>
</x-filament-panels::layout.base>
