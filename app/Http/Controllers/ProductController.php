<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $products = Product::where('name', 'like', '%'.$search.'%')->get();
        return view('pages.search.search', ['products' => $products]);
    }
    public function detail($id){
        $product = Product::find($id);
        return view('pages.product.product-detail', ['product' => $product]);
    }
}
