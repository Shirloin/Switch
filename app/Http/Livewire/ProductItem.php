<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductItem extends Component
{
    public $product;
    protected $listeners = ['updated' => 'refresh'];
    public function mount($product){
        $this->product = $product;
    }
    public function refresh($productId){
        if ($this->product->id == $productId) {
            $this->product = Product::find($productId);
        }
    }

    public function render()
    {
        return view('livewire.product-item');
    }
}
