@extends('template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen max-w-7xl flex flex-col gap-8">
        <div class="w-full h-full flex flex-col text-white mt-10 gap-8">
            <div class="relative w-full h-full flex justify-start items-start gap-8" x-data="{quantity:1}">
                <div class="w-1/2 ">
                    <img class="w-full h-full object-cover rounded-md" src="{{ $product->image }}" alt="">
                </div>
                <div class="w-1/4 flex flex-col gap-4 flex-wrap">
                    <h1 class="font-bold text-2xl">{{ $product->name }}</h1>
                    <h1 class="font-semibold text-4xl">Rp{{ formatPrice($product->price) }}</h1>
                    <h1 class="font-base text-lg">{{ $product->description }}</h1>
                </div>
                <div class="w-1/4 h-full flex justify-center items-center">
                    <div class="w-full flex flex-col gap-4 bg-white rounded-md p-4 box-border  ">
                        <div class="w-full flex justify-start items-center gap-4">
                            <img class="w-12 h-12 rounded-sm" src="{{$product->image}}" alt="">
                            <h1 class="text-md text-black">{{ $product->name }}</h1>
                        </div>
                        <hr class="w-full ring-0.5 ring-gray-300  ">
                        <div class="text-black w-full flex justify-start items-center gap-2">
                            <div class="px-1 py-1 rounded-md ring-1 ring-black flex justify-between items-center gap-4">
                                <button class="p-1 rounded-md hover:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-200 disabled:hover:bg-transparent"
                                x-on:click="quantity > 1 ? quantity-- : null" x-bind:disabled="quantity <= 1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                      </svg>
                                </button>
                                <input class="hidden" name="quantity" type="number" x-bind:value="quantity">
                                <h1 class="text-lg text-black" x-text="quantity"></h1>
                                <button class=" p-1 rounded-md hover:bg-gray-300" x-on:click="quantity++">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                      </svg>
                                </button>
                            </div>
                        </div>
                        <div class="w-full text-black flex justify-between items-center" x-data="{price: {{$product->price}}}">
                            <h1 class="text-gray-400 text-lg">SubTotal</h1>
                            <h1 class="font-bold text-lg" x-text="`Rp${(quantity * price).toLocaleString()}`"></h1>
                        </div>
                        <button class=" p-2 bg-purple-700 text-md font-semibold rounded-md">Add To Cart</button>
                        <button class=" p-2 bg-white text-purple-700 ring-1 ring-purple-700 text-md font-semibold rounded-md">Buy</button>

                    </div>
                </div>
            </div>

        </div>
        <div class="w-[75vw] pb-16">
            <x-recommended-product />
        </div>
    </div>
@endsection
