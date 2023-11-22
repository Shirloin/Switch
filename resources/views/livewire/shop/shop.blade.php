<div class="max-w-6xl w-full flex flex-col gap-8 justify-start items-start text-white">
    <div class="w-full flex justify-between items-center">
        <h1 class="text-2xl font-semibold">Manage Product</h1>
        <button onclick="Livewire.emit('openModal', 'add-product-modal')"
            class="px-4 py-2 text-lg font-semibold rounded-md bg-transparent ring-1 ring-purple-200 hover:bg-purple-200 hover:text-black transition-all duration-300">Add
            Product</button>
    </div>
    @if(count($products) == 0)
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex ">
            <h1 class="text-5xl font-semibold">There is no product</h1>
        </div>
    @endif
    @foreach ($products as $product)
        @livewire('product-item', ['product' => $product], key($product->id))
    @endforeach
</div>
