<div class="relative rounded-md  w-full p-4 flex justify-between items-start gap-4 bg-slate-700">
    <div class="w-full h-full flex justify-start items-start gap-4">
        <img class="w-60 h-40 object-cover rounded-md" src="{{ $product->image }}" alt="">
        <div class="w-1/2 flex flex-col justify-start items-start">
            <h1 class="font-base text-lg">{{ $product->name }}</h1>
            <h1 class="font-bold text-2xl">Rp{{ formatPrice($product->price) }}</h1>
            <h1 class="text-sm">{{ $product->description }}</h1>
        </div>
    </div>
    <button onclick='Livewire.emit("openModal", "product-modal", @json([$product]))' type="button"
        class=" px-4 py-2 ring-1 font-bold ring-purple-200 bg-none rounded-md hover:bg-purple-200 hover:text-black">
        Manage
    </button>
</div>
