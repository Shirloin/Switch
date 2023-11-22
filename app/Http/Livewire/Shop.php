<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Shop extends Component
{
    public $products;
    public $listeners = ['all' => 'refresh'];
    public function mount(){
        $user = Auth::user();
        $this->products = Product::where("user_id", $user->id)->get();
    }
    public function refresh(){
        $user = Auth::user();
        $this->products = Product::where("user_id", $user->id)->get();
    }

    public function render()
    {
        return view('livewire.shop.shop');
    }
}
