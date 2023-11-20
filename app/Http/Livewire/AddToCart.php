<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AddToCart extends Component
{
    public $product;
    public $quantity = 1;
    public function mount($product){
        $this->product = $product;
    }
    public function store(){
        $user = Auth::user();
        $cart = Cart::where("user_id", auth()->user()->id)
                    ->where("product_id", $this->product->id)
                    ->first();
        if($cart==null){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $this->product->id;
            $cart->quantity = $this->quantity;
            // dd($cart);
            $cart->save();
        }
        else{
            $cart->quantity += $this->quantity;
            $cart->save();
        }
        toastr()->success('Add To Cart Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
