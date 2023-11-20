@extends('template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen max-w-7xl flex flex-col gap-8">
        <div class="w-full h-full flex flex-col text-white mt-10 gap-8">
            <div class="relative w-full h-full flex justify-start items-start gap-8" x-data="{ quantity: 1 }">
                <div class="w-1/2 h-96">
                    <img class="w-full h-full object-cover rounded-md" src="{{ $product->image }}" alt="">
                </div>
                <div class="w-1/4 flex flex-col gap-4 flex-wrap">
                    <h1 class="font-bold text-2xl">{{ $product->name }}</h1>
                    <h1 class="font-semibold text-4xl">Rp{{ formatPrice($product->price) }}</h1>
                    <h1 class="font-base text-md">{{ $product->description }}</h1>
                </div>
                <div class="w-1/4 h-full flex justify-center items-center">
                    @livewire('add-to-cart', ['product' => $product])
                </div>
            </div>
            <div class="w-[75vw] pb-16">
                <x-recommended-product />
            </div>
        </div>
    @endsection
