@extends('components.layouts.beranda-layout')

@section('title', 'Beranda')

@section('content')
    <div x-data="{ searchQuery: '' }" class="flex flex-col items-center">
        <flux:text class="mt-6 mb-6 text-base text-[12px] tracking-[12px]">UMKM SEJAHTERA MENUR PUMPUNGAN</flux:text>

        <div class="text-center">
            <h2 class="text-[40px] font-bold mb-8">Daftar UMKM</h2>

            <div class="mb-6 w-[500px] px-6 mx-auto">
                <input
                    type="text"
                    x-model="searchQuery"
                    placeholder="Cari UMKM..."
                    class="w-full px-4 py-2 border rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-10 lg:px-24">
                @foreach ($tokos as $toko)
                    <div
                        x-show="'{{ strtolower($toko->nama_toko . ' ' . $toko->alamat . ' ' . $toko->deskripsi) }}'.toLowerCase().includes(searchQuery.toLowerCase())"
                        x-cloak
                        class="border rounded-lg flex flex-col pb-8 items-center justify-between h-full shadow bg-white dark:bg-zinc-700"
                    >
                        <div class="w-full h-64 rounded-lg">
                            @if($toko->logo)
                            <img src="{{ asset('storage/' . $toko->logo) }}" alt="Logo {{ $toko->nama_toko }}" class="h-64 mx-auto object-cover mb-2" />
                            @else
                                <img src="{{ asset('default-toko-logo.webp') }}" alt="Default Logo" class="h-64 w-full mx-auto rounded-lg shadow object-cover mb-2" />
                            @endif
                        </div>
                        <div class="p-4">
                                <h3 class="text-xl font-semibold">{{ $toko->nama_toko }}</h3>
                            <p class="text-lg">{{ $toko->alamat }}</p>
                            <p class="text-md">{{ $toko->no_telepon }}</p>
                            <p class="text-sm mt-2 line-clamp-3">{{ $toko->deskripsi }}</p>
                        </div>
                        <div class="mt-4">
                             @if ($toko->no_telepon)
                                @php
                                    $phone = preg_replace('/[^0-9]/', '', $toko->no_telepon);
                                    $waLink = 'https://wa.me/' . $phone;
                                @endphp
                                <a href="{{ $waLink }}" target="_blank" class="inline-flex items-center px-4 py-2 mb-4 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16.6 13.7c-.2-.1-1.2-.6-1.4-.6s-.3-.1-.5.2-.6.7-.7.9-.3.2-.5.1-1-.3-1.9-1.2c-.7-.7-1.2-1.6-1.3-1.8s0-.4.1-.5c.1-.1.3-.4.5-.6s.2-.3.3-.4.1-.3 0-.4c0-.1-.5-1.2-.7-1.6s-.4-.4-.6-.4h-.5c-.2 0-.4 0-.6.1s-.7.7-.7 1.6.8 1.9.9 2c.1.2 1.6 2.5 3.9 3.4.5.2.9.3 1.3.4.5.1.9.1 1.3.1.4 0 1.2-.1 1.5-.5s.6-.8.6-1 .1-.2-.1-.3zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.4 1.3 4.9L2 22l5.2-1.3C8.7 21.5 10.3 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2z"/>
                                    </svg>
                                    Hubungi via WhatsApp
                                </a>
                            @endif
                        </div>
                        <a href="{{ route('toko.detail', $toko->id) }}">
                            <flux:button href="{{ route('toko.detail', $toko->id) }}" variant="primary" class="p-4 w-[200px] bg-zinc-700 border-none text-white hover:bg-blue-600">
                                <p class="tracking-[5px] text-[16px] font-thin">DETAIL UMKM</p>
                            </flux:button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
