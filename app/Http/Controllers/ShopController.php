<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        // $products = Product::find(auth()->user()->id);
        $products = Product::all();
        return view('pages.shop.shop', ['products' => $products]);
    }
}
