@extends('template')

@section('title', 'Cart')

@section('content')
    <div class="max-w-7xl w-full h-full flex justify-center items-start gap-4">
        <div class="w-3/5 h-full flex flex-col justify-start items-start rounded-md gap-8">
            <h1 class="font-bold text-3xl text-white">Cart</h1>
            @foreach($carts as $cart)
                @livewire('cart-card', ['cart' => $cart])
            @endforeach

        </div>
        <div class="w-2/5 bg-slate-700 rounded-md">

        </div>
    </div>
@endsection
