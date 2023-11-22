<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AddToCart extends Component
{
    public $product;
    public $quantity = 1;
    public function mount($product){
        $this->product = $product;
    }
    public function store(){
        if (auth()->guest()) {
            $this->emit('openModal', 'login');
            return;
        }
        $user = Auth::user();
        $cart = Cart::where("user_id", auth()->user()->id)
                    ->where("product_id", $this->product->id)
                    ->first();
        if($cart==null){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $this->product->id;
            $cart->quantity = $this->quantity;
            // dd($cart);
            $cart->save();
        }
        else{
            $cart->quantity += $this->quantity;
            $cart->save();
        }
        $this->quantity = 1;
        toastr()->success('Add To Cart Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
        return redirect()->back();
    }
    public function buy(){
        if (auth()->guest()) {
            $this->emit('openModal', 'login');
            return;
        }
        $user = Auth::user();
        $header = new TransactionHeader();
        $header->id = Str::uuid(36);
        $header->user_id = $user->id;
        $header->date = Carbon::now()->tz('Asia/Jakarta');
        $header->time = Carbon::now()->tz('Asia/Jakarta');
        $header->save();
        $detail = new TransactionDetail();
        $detail->transaction_id = $header->id;
        $detail->product_id = $this->product->id;
        $detail->quantity = $this->quantity;
        $detail->save();
        Controller::SuccessMessage("Success to buy product");
        $this->quantity = 1;
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }
}
