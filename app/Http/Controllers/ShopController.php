<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = Product::where("user_id", auth()->user()->id)->get();
        // $products = Product::all();
        return view('pages.shop.shop', ['products' => $products]);
    }
}
