@extends('template')

@section('title', 'Search')

@section('content')
    <div class="max-w-7xl w-full flex flex-wrap  gap-12 justify-start items-start ">
        @foreach ($products as $product)
            <x-product-card :id="$product->id" />
        @endforeach
    </div>
@endsection
