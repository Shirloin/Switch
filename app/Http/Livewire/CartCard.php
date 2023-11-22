<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CartCard extends Component
{
    public $cart;
    public $product;
    public $quantity;
    public $isChecked;
    public function mount($cart)
    {
        $this->quantity = $cart->quantity;
        $this->cart = $cart;
        $this->product = $cart->Product;
    }
    public function min()
    {
        if ($this->quantity > 1) {
            $user = Auth::user();
            $this->quantity--;
            Cart::where("user_id", $user->id)
                ->where("product_id", $this->product->id)
                ->update(["quantity" => $this->quantity]);
            $this->emit('update');
        }
    }
    public function add()
    {
        $user = Auth::user();
        $this->quantity++;
        Cart::where("user_id", $user->id)
            ->where("product_id", $this->product->id)
            ->update(["quantity" => $this->quantity]);
        $this->emit('update');
    }
    public function destroy()
    {
        $user = Auth::user();
        $cart = Cart::where("user_id", $user->id)
            ->where("product_id", $this->product->id)->first();
        if ($cart != null) {
            // dd($cart);
            $cart->delete();
            $this->emitUp('refresh');
            $this->emit('update');
        }
    }

    public function check()
    {
        // $this->isChecked = !$this->isChecked;
        $totalPrice = $this->quantity * $this->product->price;

        $this->emitUp('cartChecked', $totalPrice, $this->product->id, $this->isChecked);
    }

    public function render()
    {
        return view('livewire.cart.cart-card');
    }
}
