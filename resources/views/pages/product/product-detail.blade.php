@extends('template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen max-w-7xl flex flex-col gap-8">
        <div class="relative w-full h-full flex md:flex-row text-white mt-10 gap-8">
            <div class="w-3/5 flex flex-col gap-4">
                <img class="w-full h-full object-cover rounded-md" src="{{$product->image}}" alt="">
                <div class="w-full flex flex-col gap-4">
                    <h1 class="font-bold text-3xl">{{$product->name}}</h1>
                    <h1 class="font-semibold text-2xl">Rp{{$product->price}}</h1>
                    <h1 class="font-base text-xl">{{$product->description}}</h1>
                </div>
            </div>
            <div class="w-2/5 h-full bg-red-200">
                <button class="absolute  p-2 bg-purple-700 text-xl font-semibold rounded-md">Add To Cart</button>
            </div>

        </div>
        <div class="w-[75vw] pb-16">
            <x-recommended-product />
        </div>
    </div>
@endsection
