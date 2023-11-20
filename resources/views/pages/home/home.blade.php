@extends('template')

@section('title', 'Home')

@section('content')
    <div class="xl:mx-80 mt-12 mb-10 mx-2 flex flex-col gap-20 w-full max-w-7xl">
        <div class="flex flex-col gap-5 ">
            <x-product-carousel />
        </div>
        <div class="flex flex-col gap-5 ">
            <x-recommended-product />
        </div>
    </div>
@endsection
