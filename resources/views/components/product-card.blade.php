<a href="/product-detail/{{ $product->id }}">
    <div class="w-52 h-72 rounded-md shadow-md flex flex-col text-black bg-white  ">
        <img src="{{ $product->image }}"
             alt="{{ $product->name }}"
             class="w-52 h-36  rounded-t-md object-cover"
        />
        <div class="m-2 flex flex-col gap-0.5">
            <div class="text-sm max-h-8">
                {{ $product->name }}
            </div>
            <div class="text-md font-bold">
                Rp{{formatPrice($product->price)}}
            </div>
            <div class="text-xs max-w-full overflow-hidden flex-wrap max-h-12 text-gray-800 overflow-ellipsis">
                {{ $product->description }}
            </div>
        </div>
    </div>
</a>
