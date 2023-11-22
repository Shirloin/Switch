<?php

namespace App\Http\Livewire;

use App\Models\Cart as CartModel;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Cart extends Component
{
    public $carts;

    protected $listeners = ['refresh' => 'refresh', 'cartChecked' => 'updateTotal'];
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

    public function buy()
    {
        if(count($this->checkedItems)==0){
            toastr()->error('There is no selected product', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
            return;
        }
        $user = Auth::user();
        $header = new TransactionHeader();
        $header->id = Str::uuid(36);
        $header->user_id = $user->id;
        $header->date = now();
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
    }
    public function render()
    {
        return view('livewire.cart.cart');
    }
}
