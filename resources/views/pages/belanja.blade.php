@extends('components.layouts.beranda-layout')

@section('title', 'Shop')

@section(section: 'content')
<div
    x-data="{
        selectedCategory: 'all',
        searchQuery: '',
        isMatch(menu) {
            if (!this.searchQuery) return true;
            const query = this.searchQuery.toLowerCase();
            return menu.nama_menu.toLowerCase().includes(query)
                || (menu.deskripsi || '').toLowerCase().includes(query)
                || (menu.toko_nama || '').toLowerCase().includes(query);
        }
    }"
    class="flex flex-col lg:flex-row gap-8 max-w-7xl mx-auto px-4 relative"
>
    <div class="w-full lg:w-2/3">
        <div class="text-center mb-4">
            <flux:text class="mt-6 text-base text-[12px] tracking-[12px]">SEMUA PRODUK</flux:text>
            <flux:separator variant="subtle" class="mt-4 mb-4" />
        </div>

        <div class="flex flex-wrap justify-between px-4">
            <div class="mb-6 text-center">
                <input
                    x-ref="searchInput"
                    x-model="searchQuery"
                    type="text"
                    placeholder="Cari menu..."
                    class="w-full max-w-md px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-zinc-500"
                />
            </div>
            <div class="flex flex-wrap justify-center gap-2 mb-6">
                <button
                    class="px-4 py-2 rounded border text-sm cursor-pointer"
                    :class="selectedCategory === 'all' ? 'bg-zinc-700 text-white' : 'bg-white text-gray-700'"
                    @click="selectedCategory = 'all'"
                >Semua</button>
                @foreach($categories as $category)
                    <button
                        class="px-4 py-2 rounded border text-sm cursor-pointer"
                        :class="selectedCategory === '{{ $category->id }}' ? 'bg-zinc-700 text-white' : 'bg-white text-gray-700'"
                        @click="selectedCategory = '{{ $category->id }}'"
                    >{{ $category->nama_kategori }}</button>
                @endforeach
            </div>
        </div>

        @foreach($categories as $category)
            <div x-show="selectedCategory === 'all' || selectedCategory === '{{ $category->id }}'"
                 class="mb-10" x-cloak>
                <h2 class="text-xl font-semibold mb-3 text-gray-800 dark:text-white">{{ $category->nama_kategori }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($category->menus as $menu)
                    <div
                        x-show="isMatch({
                            nama_menu: '{{ strtolower($menu->nama_menu) }}',
                            deskripsi: '{{ strtolower($menu->deskripsi ?? '') }}',
                            toko_nama: '{{ strtolower($menu->toko->nama_toko ?? '') }}'
                        })"
                        x-cloak
                        class="border rounded-lg shadow bg-white dark:bg-zinc-700"
                    >
                            @if ($menu->gambar)
                                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="w-full h-48 object-cover rounded-lg">
                            @else
                                <img src="{{ asset('default-menu.jpeg') }}" alt="{{ $menu->nama_menu }}" class="w-full h-48 object-cover rounded-lg">
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-bold">{{ $menu->nama_menu }}</h3>
                                <p class="text-sm text-gray-600 italic">Toko: {{ $menu->toko->nama_toko ?? '-' }}</p>
                                <p class="text-sm text-gray-500">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <p class="text-sm mt-2 text-gray-700 line-clamp-2">{{ $menu->deskripsi }}</p>
                            </div>
                            <div class="p-4">
                                @if ($menu->toko && $menu->toko->no_telepon)
                                    @php
                                        $phone = preg_replace('/[^0-9]/', '', $menu->toko->no_telepon);
                                        $waLink = 'https://wa.me/' . $phone;
                                    @endphp
                                    <a href="{{ $waLink }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M16.6 13.7c-.2-.1-1.2-.6-1.4-.6s-.3-.1-.5.2-.6.7-.7.9-.3.2-.5.1-1-.3-1.9-1.2c-.7-.7-1.2-1.6-1.3-1.8s0-.4.1-.5c.1-.1.3-.4.5-.6s.2-.3.3-.4.1-.3 0-.4c0-.1-.5-1.2-.7-1.6s-.4-.4-.6-.4h-.5c-.2 0-.4 0-.6.1s-.7.7-.7 1.6.8 1.9.9 2c.1.2 1.6 2.5 3.9 3.4.5.2.9.3 1.3.4.5.1.9.1 1.3.1.4 0 1.2-.1 1.5-.5s.6-.8.6-1 .1-.2-.1-.3zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.4 1.3 4.9L2 22l5.2-1.3C8.7 21.5 10.3 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2z"/>
                                        </svg>
                                        Hubungi via WhatsApp
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada menu dalam kategori ini.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>

    <div class="hidden lg:block w-full lg:w-1/3 mt-20">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">Toko UMKM</h2>
        <div class="space-y-6 overflow-y-auto max-h-[150vh] pr-2">
            @foreach($tokos as $toko)
                <div class="border rounded-lg shadow bg-white dark:bg-zinc-800 flex gap-4 p-4 items-center">
                    <img src="{{ $toko->logo ? asset('storage/' . $toko->logo) : asset('default-toko-logo.webp') }}"
                         class="h-16 w-16 object-cover rounded-full border" alt="{{ $toko->nama_toko }}" />
                    <div>
                        <h3 class="text-md font-semibold">{{ $toko->nama_toko }}</h3>
                        <p class="text-sm text-gray-500">{{ Str::limit($toko->deskripsi, 100) }}</p>
                        <flux:button size="xs" href="{{ route('toko.detail', $toko->id) }}" variant="primary" class="mt-4 bg-zinc-700 text-white hover:bg-blue-900">
                            <p class="tracking-[7px] text-[8px] border-none p-4 font-light text-base">LIHAT TOKO</p>
                        </flux:button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

@section('tokos-sidebar')
    <h2 class="text-xl font-semibold mb-4 p-4 text-gray-800 dark:text-white">Toko UMKM</h2>
    <flux:navlist variant="outline" class="mb-6 flex flex-col gap-24 overflow-y-auto pt-16">
        @foreach ($tokos as $toko)
            <flux:navlist.item href="{{ route('toko.detail', $toko->id) }}">
                <div class="border rounded-lg shadow bg-white dark:bg-zinc-700 overflow-hidden flex">
                    @if($toko->logo)
                        <img src="{{ asset('storage/' . $toko->logo) }}" alt="Logo {{ $toko->nama_toko }}" class="w-8" />
                    @else
                        <img src="{{ asset('default-toko-logo.webp') }}" alt="Default Logo" class="w-8 object-cover" />
                    @endif
                    <div class="p-4 text-left">
                        <h3 class="text-xl font-semibold">{{ $toko->nama_toko }}</h3>
                        <p class="text-sm">{{ $toko->alamat }}</p>
                        <p class="text-xs text-gray-400">{{ $toko->no_telepon }}</p>
                        <p class="text-xs mt-2 text-gray-500 line-clamp-3">{{ $toko->deskripsi }}</p>
                    </div>
                </div>
            </flux:navlist.item>
        @endforeach
    </flux:navlist>
@endsection
