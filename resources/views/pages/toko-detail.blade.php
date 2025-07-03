@extends('components.layouts.beranda-layout')

@section('title', 'Detail Toko')

@section('content')
<div class="mx-auto py-6 px-20 w-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start text-[16px]">
        {{-- Left Side: Logo --}}

        <div class="w-full flex justify-center">
            @if ($toko->logo)
                <img src="{{ asset('storage/' . $toko->logo) }}" alt="Logo {{ $toko->nama_toko }}" class="w-full max-w-xs rounded-lg shadow" />
            @else
                <img src="{{ asset('default-toko-logo.webp') }}" alt="Default Logo" class="w-full max-w-xs rounded-lg shadow" />
            @endif
        </div>

        {{-- Right Side: Info --}}
        <div>
            <h1 class="text-3xl font-bold mb-4">{{ $toko->nama_toko }}</h1>

            <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $toko->alamat }}</p>
            <p class="text-gray-700 mb-2"><strong>No. Telepon:</strong> {{ $toko->no_telepon }}</p>
            <p class="text-gray-700"><strong>Deskripsi:</strong></p>
            <p class="text-gray-600 mt-1 mb-6">{{ $toko->deskripsi }}</p>

            @if ($toko->no_telepon)
                @php
                    $phone = preg_replace('/[^0-9]/', '', $toko->no_telepon);
                    $waLink = 'https://wa.me/' . $phone;
                @endphp
                <a href="{{ $waLink }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16.6 13.7c-.2-.1-1.2-.6-1.4-.6s-.3-.1-.5.2-.6.7-.7.9-.3.2-.5.1-1-.3-1.9-1.2c-.7-.7-1.2-1.6-1.3-1.8s0-.4.1-.5c.1-.1.3-.4.5-.6s.2-.3.3-.4.1-.3 0-.4c0-.1-.5-1.2-.7-1.6s-.4-.4-.6-.4h-.5c-.2 0-.4 0-.6.1s-.7.7-.7 1.6.8 1.9.9 2c.1.2 1.6 2.5 3.9 3.4.5.2.9.3 1.3.4.5.1.9.1 1.3.1.4 0 1.2-.1 1.5-.5s.6-.8.6-1 .1-.2-.1-.3zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.4 1.3 4.9L2 22l5.2-1.3C8.7 21.5 10.3 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
            @endif

            <div class="mt-4">
                <a href="{{ route('toko') }}" class="inline-block text-blue-600 hover:underline">← Kembali ke Daftar Toko</a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 items-start justify-center text-[12px] mt-8 w-full">
        @if ($toko->menus->count() > 0)
            @foreach ($toko->menus as $menu)
                <div class="mt-8 p-4 border rounded-lg bg-white dark:bg-zinc-700 shadow">
                    <h4 class="text-xl font-semibold mb-2">{{ $menu->nama_menu }}</h4>
                    <h3 class="text-gray-600 mb-2">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</h3>
                    <p class="text-gray-500 mb-4">{{ $menu->deskripsi }}</p>
                    @if ($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="w-full h-48 object-cover rounded-lg">
                    @else
                        <img src="{{ asset('default-menu.jpeg') }}" alt="{{ $menu->nama_menu }}" class="w-full h-48 object-cover rounded-lg">
                    @endif
                </div>
            @endforeach
        @else
            <div class="w-full mt-8 p-4 border rounded-lg bg-white dark:bg-zinc-700 shadow">
                <p class="text-gray-500">Belum ada menu yang tersedia di toko ini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
