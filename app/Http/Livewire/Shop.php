<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{
    public $products;
    public $listeners = ['all' => 'refresh'];
    public function mount(){
        $this->products = Product::all();
    }
    public function refresh(){
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.shop');
    }
}
