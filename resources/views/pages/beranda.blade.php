@extends('components.layouts.beranda-layout')

@section('title', 'Beranda')

@section('content')
<div class="w-full flex flex-col items-center">
    <img src="{{ asset('kelurahan.png') }}" alt="Large Banner"
        class="hidden md:block max-h-[700px] w-full object-cover" />

    <img src="{{ asset('kelurahan-mobile.png') }}" alt="Mobile Banner"
        class="block md:hidden w-full object-cover" />

    <flux:text class="lg:block hidden text-base text-[12px] tracking-[12px] text-center mt-4">UMKM SEJAHTERA MENUR PUMPUNGAN</flux:text>
    <flux:separator variant="subtle" class="mt-4 mb-6"/>

    <div class="flex flex-col lg:flex-row gap-6 w-full px-4 md:px-12">
        <div class="p-6 text-center w-full rounded-lg bg-zinc-700 text-white flex flex-col justify-center items-center gap-6 flex-1">
            <h2 class="text-[36px] md:text-[48px] lg:text-[60px] font-bold leading-tight">Selamat Datang</h2>
            <p class="max-w-lg text-sm md:text-base">
                Selamat menjelajahi UMKM Sejahtera Menur Pumpungan! Jadilah bagian dari komunitas kami yang bersemangat untuk mendorong pertumbuhan dan keberhasilan UMKM. Bersama-sama, kita dapat membangun masa depan yang cerah bagi dunia UMKM.
            </p>
        </div>

        <flux:text class="md:hidden block text-base text-[12px] tracking-[12px] text-center mt-4">BELANJA SEKARANG!</flux:text>
        <flux:separator variant="subtle" class=" md:hidden block"/>

        <div class="text-center flex flex-col gap-6 justify-center items-center w-full flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                @foreach ($tokos as $toko)
                    <div class="border rounded-lg shadow bg-white dark:bg-zinc-700 overflow-hidden flex flex-col">
                        @if($toko->logo)
                            <img src="{{ asset('storage/' . $toko->logo) }}" alt="Logo {{ $toko->nama_toko }}" class="w-full h-40 object-cover" />
                        @else
                            <img src="{{ asset('default-toko-logo.webp') }}" alt="Default Logo" class="w-full h-40 object-cover" />
                        @endif
                        <div class="p-4 text-left">
                            <h3 class="text-xl font-semibold">{{ $toko->nama_toko }}</h3>
                            <p class="text-sm">{{ $toko->alamat }}</p>
                            <p class="text-xs text-gray-400">{{ $toko->no_telepon }}</p>
                            <p class="text-xs mt-2 text-gray-500 line-clamp-3">{{ $toko->deskripsi }}</p>
                        </div>
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
                        </div>
                @endforeach
            </div>

            <flux:button href="/toko" variant="primary" class="w-[350px] text-[18px] h-[60px] bg-zinc-700 text-white hover:bg-blue-600">
                <p class="tracking-[6px] font-light">LIHAT SEMUA UMKM</p>
            </flux:button>
        </div>
    </div>
</div>
@endsection
