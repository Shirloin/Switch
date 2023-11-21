<div class="w-full h-full flex flex-col justify-start items-start gap-4">
    <div class="w-full h-full flex justify-between items-start text-lg gap-6 text-white">
        <div class="w-full flex ustify-start items-start gap-6">
            <input wire:model='isChecked'  wire:click="check"
                class="w-5 h-5 self-center checked:bg-purple-500 border-purple-500 bg-purple-200 rounded-sm ring-1 ring-purple-500"
                type="checkbox">
            <img class="w-24 h-24 rounded-md object-cover" src="{{ $product->image }}" alt="">
            <div class="flex flex-col justify-start items-start">
                <h1>{{ $product->name }}</h1>
                <h1 class="font-bold ">Rp{{ formatPrice($product->price) }}</h1>
            </div>
        </div>
        <div class="h-full flex justify-end items-end gap-8 self-end">
            <button wire:click="destroy">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
            <div class="flex justify-center items-center gap-4 text-white">
                <button wire:click="min" class="disabled:cursor-not-allowed disabled:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                <h1>{{ $quantity }}</h1>
                <button wire:click='add'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <hr class="ring-0.5 ring-gray-300 w-full">
</div>
