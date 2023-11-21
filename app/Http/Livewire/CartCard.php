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
    public function mount($cart)
    {
        $this->quantity = $cart->quantity;
        $this->cart = $cart;
        $this->product = $cart->Product;
    }
    public function min()
    {
        $user = Auth::user();
        $this->quantity--;
        Cart::where("user_id", $user->id)
            ->where("product_id", $this->product->id)
            ->update(["quantity" => $this->quantity]);
    }
    public function add()
    {
        $user = Auth::user();
        $this->quantity++;
        Cart::where("user_id", $user->id)
            ->where("product_id", $this->product->id)
            ->update(["quantity" => $this->quantity]);
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
        }
    }

    public function render()
    {
        return view('livewire.cart.cart-card');
    }
}
