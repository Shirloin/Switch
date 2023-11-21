<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Facades\Toastr;

class CartController extends Controller
{

    // protected $listeners = ['cartItemRemoved' => 'refreshCart'];
    public function index(){
        return view("pages.cart.cart");
    }
}
