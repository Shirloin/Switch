<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Cart as CartModel;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Cart extends Component
{
    public $carts;

    protected $listeners = ['refresh' => 'refresh', 'cartChecked' => 'updateTotal', 'update' => 'update'];
    public $totalPrice = 0;
    public $checkedItems = [];
    public function mount()
    {
        $user = Auth::user();
        $this->carts = CartModel::where("user_id", $user->id)->with('Product')->get();
    }
    public function refresh()
    {
        $user = Auth::user();
        $this->carts = CartModel::where("user_id", $user->id)->with('Product')->get();
    }

    public function updateTotal($price, $productId, $isChecked)
    {
        if ($isChecked) {
            $this->checkedItems[$productId] = $this->carts->firstWhere('product_id', $productId)->quantity;
            $this->totalPrice += $price;
        } else {
            unset($this->checkedItems[$productId]);
            $this->totalPrice -= $price;
        }
    }

    public function update(){
        $this->totalPrice = 0;
        foreach($this->carts as $c){
            $price = $c->Product->price;
            $this->totalPrice += $c->quantity * $price;
        }
    }

    public function buy()
    {
        if (auth()->guest()) {
            $this->emit('openModal', 'login');
            return;
        }
        if(count($this->checkedItems)==0){
            Controller::FailMessage("There is no selected product");
            return;
        }
        $user = Auth::user();
        $header = new TransactionHeader();
        $header->id = Str::uuid(36);
        $header->user_id = $user->id;
        $header->date = Carbon::now()->tz('Asia/Jakarta');
        $header->time = Carbon::now()->tz('Asia/Jakarta');
        $header->save();
        foreach ($this->checkedItems as $productId => $quantity) {
            $product = Product::find($productId);
            TransactionDetail::create([
                'transaction_id' => $header->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
        CartModel::where("user_id", Auth::id())
            ->whereIn('product_id', array_keys($this->checkedItems))
            ->delete();
        $this->refresh();
        Controller::SuccessMessage("Checkout success");
        $this->totalPrice = 0;
    }
    public function render()
    {
        return view('livewire.cart.cart');
    }
}
