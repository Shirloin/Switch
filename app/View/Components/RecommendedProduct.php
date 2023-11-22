<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class RecommendedProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;
    public function __construct()
    {
        $this->products = Product::inRandomOrder()->take(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recommended-product');
    }
}
