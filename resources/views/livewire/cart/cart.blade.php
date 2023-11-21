<div class="max-w-7xl w-full h-full flex justify-center items-start gap-12">
    @if (count($carts)>0)
        <div class="w-3/5 h-full flex flex-col justify-start items-start rounded-md gap-8">
            <h1 class="font-bold text-3xl text-white">Cart</h1>
            @foreach ($carts as $cart)
                @livewire('cart-card', ['cart' => $cart], key($cart->user_id . '-' . $cart->product_id))
            @endforeach
        </div>
        <div class="relative w-1/4  bg-slate-700 rounded-md flex flex-col px-4 py-8 box-border gap-8">
            <div class="w-full flex flex-col gap-4">
                <div class="flex w-full justify-between items-center">
                    <h1 class="text-md text-white ">Total Price</h1>
                    <h1 class="text-white">Rp{{ formatPrice($totalPrice) }}</h1>
                </div>
                <hr class="w-full ring-0.5 ring-white">
            </div>
            <button wire:click="buy" class="w-full rounded-md bg-purple-500 text-white text-md font-bold p-2 hover:bg-purple-700 transition-all duration-200">Buy</button>
        </div>
    @else
    <h1 class="font-bold text-3xl text-white self-center">Cart is empty</h1>
    @endif
</div>
<script>

</script>
