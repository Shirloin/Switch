<?php

namespace App\Http\Livewire;

use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionHistory extends Component
{
    public $transactions;
    public function mount(){
        $user = Auth::user();
        $this->transactions = TransactionHeader::where("user_id", $user->id)->orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.transaction.transaction-history');
    }
}
