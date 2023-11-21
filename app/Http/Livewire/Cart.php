<?php

namespace App\Http\Livewire;

use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $carts;
    protected $listeners = ['refresh' => 'refresh'];
    public function mount()
    {
        $user = Auth::user();
        $this->carts = CartModel::where("user_id", $user->id)->with('Product')->get();
    }
    public function refresh(){
        // dd("test");
        $user = Auth::user();
        $this->carts = CartModel::where("user_id", $user->id)->with('Product')->get();
    }
    public function render()
    {
        return view('livewire.cart.cart');
    }
}
