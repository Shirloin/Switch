<div class="w-full flex flex-col gap-5 ">
    <h1 class="text-4xl font-bold text-white">Recommended for you</h1>
    <div class="flex flex-row flex-wrap gap-12 justify-start">
        @foreach($products as $product)
            <x-product-card :id="$product->id"/>
        @endforeach
    </div>
</div>
