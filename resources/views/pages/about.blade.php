@extends('components.layouts.beranda-layout')

@section('title', 'About Us')

@section('content')

<div class="mx-auto pt-16 pb-8 px-2">
    <div class="flex gap-12 h-120 w-full px-16">
        <div class="flex justify-center flex-1">
            <img class="rounded-lg shadow-lg object-cover" src="{{ asset('about.png') }}" alt="">
        </div>
        <div class="p-6 text-center w-full rounded-lg bg-zinc-700 text-white flex flex-col flex-[1.5] justify-center items-center gap-8 flex-1 ">
            <h2 class="text-[60px] font-bold w-[350px] leading-14 text-center ">About Us</h2>
            <p class="w-[500px]">
                Selamat menjelajahi Kampung Kue Menur Pumpungan!
                Jadilah bagian dari komunitas kami yang bersemangat untuk mendorong pertumbuhan dan keberhasilan UMKM. Bersama-sama, kita dapat membangun masa depan yang cerah bagi dunia UMKM.
            </p>
        </div>
    </div>
</div>

@endsection
