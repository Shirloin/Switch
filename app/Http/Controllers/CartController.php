<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Facades\Toastr;

class CartController extends Controller
{

    public function index(){
        $user = Auth::user();
        $carts = Cart::where("user_id", $user->id)->with('Product')->get();
        return view("pages.cart.cart", ["carts" => $carts]);
    }
    public function decrement(Cart $cart){
        if($cart->quantity > 1){
            $cart->decrement('quantity');
        }
    }
}
