<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCard extends Component
{
    public $cart;
    public $productId;
    public $product;
    public $quantity;
    public function mount($cart){
        $this->quantity = $cart->quantity;
        $this->cart = $cart;
        $this->product = $cart->Product;
        $this->productId = $cart->product_id;
    }
    public function min(){
        $user = Auth::user();
        $cart = Cart::where("user_id", $user->id)
        ->where("product_id", $this->product->id)
        ->first();
        if($cart!=null){
            $cart->decrement("quantity");
        }
    }
    public function add($id){
        dd($id);
        $user = Auth::user();
        $cart = Cart::where("user_id", $user->id)
        ->where("product_id", $this->productId)
        ->first();
        if($cart!=null){
            $cart->increment("quantity");
        }
    }
    public function render()
    {
        return view('livewire.cart-card');
    }
}
