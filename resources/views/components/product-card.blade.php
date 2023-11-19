<a href="/product-detail/{{ $product->id }}">
    <div class="w-36 h-80 md:w-48 md:h-80 rounded-md shadow-md flex flex-col bg-white overflow-hidden">
        <img src="{{ $product->image }}"
             alt="{{ $product->name }}"
             class="w-48 h-48  rounded-t-md object-cover"
        />
        <div class="m-2 flex flex-col gap-0.5">
            <div class="text-sm max-h-8">
                {{ $product->name }}
            </div>
            <div class="text-md font-bold">
                Rp{{$product->price}}
            </div>
            <div class="text-xs max-h-12 text-gray-800">
                {{ $product->description }}
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <button class="p-1 ring-1 ring-white text-white">Get Skin</button>
        </div>
    </div>
</a>
