<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UMKM Menur')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="min-h-screen w-full bg-white dark:bg-zinc-800">
    <flux:header class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:brand
            href="/beranda"
            logo="{{ asset('kampung-kue.png') }}"
            name="UMKM Menur"
            class="lg:static lg:translate-x-0 absolute left-1/2 -translate-x-1/2 dark:hidden"
        />
        <flux:brand
            href="/beranda"
            logo="https://fluxui.dev/img/demo/dark-mode-logo.png"
            name="UMKM Menur"
            class="lg:static lg:translate-x-0 absolute left-1/2 -translate-x-1/2 hidden dark:flex"
        />
        <flux:navbar class="max-lg:hidden">
            <flux:navbar.item icon="home" href="/beranda">Beranda</flux:navbar.item>
            <flux:navbar.item icon="shopping-cart" href="/belanja">Belanja</flux:navbar.item>
            <flux:navbar.item icon="building-storefront" href="/toko">Toko</flux:navbar.item>
            <flux:navbar.item icon="user-group" href="/about">Tentang Kami</flux:navbar.item>
            <flux:separator vertical variant="subtle" class="my-2"/>
        </flux:navbar>
        <flux:spacer />
        <flux:navbar class="me-4">
            {{-- <flux:navbar.item icon="magnifying-glass" href="#" label="Search" /> --}}
            {{-- <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" /> --}}
        </flux:navbar>
        <flux:button
            href="/login"
            icon="arrow-right-start-on-rectangle"
            variant="ghost"
            class="text-sm font-medium me-4"
        >
            Admin
        </flux:button>
        @if (request()->is('belanja'))
            <button
                class="lg:hidden fixed bottom-6 right-6 z-50 bg-zinc-800 text-white p-3 rounded-full shadow-lg"
                onclick="toggleTokoSidebar()">
                <h3>LIST TOKO</h3>
            </button>
        @endif
    </flux:header>
    <flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <flux:brand href="#" logo="{{ asset('kampung-kue.png') }}" name="UMKM Menur" class="px-2 dark:hidden" />
        <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="UMKM Menur" class="px-2 hidden dark:flex" />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="home" href="/beranda">Beranda</flux:navlist.item>
            <flux:navlist.item icon="shopping-cart" href="/belanja">Belanja</flux:navlist.item>
            <flux:navlist.item icon="building-storefront" href="/toko">Toko</flux:navlist.item>
            <flux:navlist.item icon="user-group" href="/about">Tentang Kami</flux:navlist.item>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
            <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
        </flux:navlist>
    </flux:sidebar>

    <flux:main class="!p-0 !m-0">
        @yield('content')
    </flux:main>
    <flux:footer class="mt-16 bg-zinc-900 text-white py-12 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About Kampung Kue -->
            <div>
                <h3 class="text-xl font-bold mb-3">Tentang Kampung Kue Menur</h3>
                <p class="text-sm text-gray-300">
                    Kampung Kue Menur adalah pusat pemberdayaan UMKM yang berfokus pada kuliner lokal khas. Kami mendukung pelaku usaha kecil untuk tumbuh dan berkembang di era digital.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-3">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/beranda" class="hover:text-blue-400 transition">Beranda</a></li>
                    <li><a href="/belanja" class="hover:text-blue-400 transition">Belanja</a></li>
                    <li><a href="/toko" class="hover:text-blue-400 transition">Daftar Toko</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-bold mb-3">Kontak</h3>
                <p class="text-sm text-gray-300">Kelurahan Menur Pumpungan, Surabaya</p>
                <p class="text-sm text-gray-300">Email: info@kampungkue.id</p>
                <p class="text-sm text-gray-300">WhatsApp: 0812-3456-7890</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="hover:text-blue-400" aria-label="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="hover:text-blue-400" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="hover:text-blue-400" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center text-sm text-gray-500 mt-12 border-t border-zinc-800 pt-6">
            &copy; {{ date('Y') }} Kampung Kue Menur. All rights reserved.
        </div>
    </flux:footer>
    <!-- Flux Sidebar on mobile -->
   <flux:sidebar
        id="tokoSidebar"
        name="tokoSidebar"
        class="lg:hidden fixed top-0 right-0 h-full bg-white dark:bg-zinc-800 border-l border-zinc-200 dark:border-zinc-700 translate-x-full transition-transform z-[9999]">
        @hasSection('tokos-sidebar')
            @yield('tokos-sidebar')
        @endif
    </flux:sidebar>

    @fluxScripts
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('tokoSidebar');

            function toggleTokoSidebar() {
                if (!sidebar) return;
                sidebar.classList.toggle('translate-x-0');
                sidebar.classList.toggle('translate-x-full');
            }

            // Attach toggle function to global window so it's accessible inline
            window.toggleTokoSidebar = toggleTokoSidebar;

            // Optional: close when clicking outside
            document.addEventListener('click', function (e) {
                const toggleButton = e.target.closest('button[onclick="toggleTokoSidebar()"]');

                if (sidebar && !sidebar.contains(e.target) && !toggleButton && sidebar.classList.contains('translate-x-0')) {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('translate-x-full');
                }
            });
        });
    </script>

</body>
</html>



