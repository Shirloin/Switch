<div class="w-full flex flex-col gap-4 bg-white rounded-md p-4 box-border  ">
    <div class="w-full flex justify-start items-center gap-4">
        <img class="w-16 h-12 rounded-md object-cover" src="{{ $product->image }}" alt="">
        <h1 class="text-md text-black">{{ $product->name }}</h1>
    </div>
    <hr class="w-full ring-0.5 ring-gray-300  ">
    <div class="text-black w-full flex justify-start items-center gap-2">
        <div class="px-1 py-1 rounded-md ring-1 ring-black flex justify-between items-center gap-4">
            <button
                class="p-1 rounded-md hover:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-200 disabled:hover:bg-transparent"
                x-on:click="quantity > 1 ? quantity-- : null; $wire.set('quantity', quantity)"
                x-bind:disabled="quantity <= 1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
            </button>
            <input x-model="quantity" class="hidden" name="quantity" type="number" x-bind:value="quantity">
            <h1 class="text-lg text-black w-10 text-center" x-text="quantity" wire:model="quantity"></h1>
            <button class=" p-1 rounded-md hover:bg-gray-300" x-on:click="quantity++; $wire.set('quantity', quantity)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>
    </div>
    <div class="w-full text-black flex justify-between items-center" x-data="{ price: {{ $product->price }} }">
        <h1 class="text-gray-400 text-lg">SubTotal</h1>
        <h1 class="font-bold text-lg" x-text="`Rp${(quantity * price).toLocaleString()}`"></h1>
    </div>
    <button wire:click='store' class=" p-2 bg-purple-700 text-md font-semibold rounded-md">Add To Cart</button>
    <button wire:click='buy' class=" p-2 bg-white text-purple-700 ring-1 ring-purple-700 text-md font-semibold rounded-md">Buy</button>
</div>
