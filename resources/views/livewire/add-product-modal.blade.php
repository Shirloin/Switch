<div class="w-full p-4 flex flex-col justify-center items-center gap-4">
    {{-- <h1 class="w-full text-3xl font-bold text-black">Edit Product</h1> --}}
    <div class="relative group w-full flex flex-col rounded-md justify-center items-center gap-2">
        @if ($photo)
            <img class="w-full h-40 rounded-md object-contain" src="{{ $photo->temporaryUrl() }}">
        @else
            <img class="w-full h-40 rounded-md object-contain" src="{{ $image }}" alt="">
        @endif
        <div
            class="group-hover:flex justify-center items-center absolute bg-gray-500 bg-opacity-50 hidden  w-full h-full"
            id="fileUploadForm">
            <label class="w-full h-full rounded-md cursor-pointer flex justify-center items-center">
                <input wire:model='photo' name="file" class="hidden" type="file"
                    accept="image/jpeg, .jpeg, .jpg, image/png, .png">
                <h1 class="text-lg text-white font-semibold">Choose Image</h1>
            </label>
        </div>
    </div>
    <div class="w-full flex flex-col gap-2">
        <label for="">Product Name</label>
        <input wire:model='name' class="modal-input w-full" type="text" value="{{ $name }}">
    </div>
    <div class="w-full flex flex-col gap-2">
        <label for="">Product Price</label>
        <input wire:model="price" class="modal-input w-full" type="text" value="{{ $price }}">
    </div>
    <div class="w-full flex flex-col gap-2" x-data="{ categoryDropdown: false, selectedCategory: '', selectedCategoryName: 'Product Category', searchQuery: '' }" @click.away="categoryDropdown = false">
        <label for="">Product Category</label>
        <button type="button" x-show="!categoryDropdown"
            class="w-full p-2 ring-1 ring-gray-300 rounded-md flex justify-between items-center gap-4"
            @click.stop="categoryDropdown = !categoryDropdown">
            <p class="text-sm text-gray-400" x-text="selectedCategoryName"></p>
            <div class="ml-auto">
                <svg x-show="!categoryDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
                <svg x-show="categoryDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </div>
        </button>
        <input x-show="categoryDropdown" wire:model.live="search" type="text" placeholder="Search Category..."
            class="w-full input-style" x-model="searchQuery" @click.away="categoryDropdown = false">

        <input wire:model="category" type="hidden" name="product_category" :value="selectedCategory"
            x-bind:value="selectedCategory">

        <div class="relative w-full flex gap-4 justify-start mt-1 ">
            <div x-show="categoryDropdown"
                class="absolute z-10 w-full max-h-40 overflow-y-auto left-0 bg-white shadow-md rounded-md text-sm font-normal text-start">
                @foreach ($categories as $c)
                    <div class="w-full p-2 bg-white hover:bg-gray-300 rounded-md text-black text-md flex justify-start"
                        @click.stop="selectedCategory = '{{ $c->id }}'; categoryDropdown = false; selectedCategoryName = '{{ $c->name }}'; $wire.emit('updateCategory', '{{ $c->id }}')">
                        <h1>{{ $c->name }}</h1>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col gap-2">
        <label for="">Product Description</label>
        <textarea wire:model="description" class="w-full modal-input" name="" id="" cols="30"
            rows="5"></textarea>
    </div>
    <div class="w-full flex justify-end items-center gap-4">
        <button class="p-2 w-20 rounded-md bg-blue-500 text-white" wire:click='save'>Add</button>
    </div>

</div>
