<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ProductModal extends ModalComponent
{
    use WithFileUploads;
    public $product;
    public $name;
    public $price;
    public $description;
    public $image;
    public $photo;
    public function mount($product)
    {
        // $this->product = Product::find($productId);
        $this->product = $product;
        $this->name = $product["name"];
        $this->price = $product["price"];
        $this->description = $product["description"];
        $this->image = $product["image"];
    }
    public function render()
    {
        return view('livewire.product.product-modal');
    }

    public function save(){

        $validate = Validator::make(['name' => $this->name, 'price' => $this->price, 'description' => $this->description], [
            'name' => 'required|min:3|max:50',
            'price' => 'required|min:1|numeric',
            'description' => 'required|min:5'
        ]);
        if($validate->fails()){
            Controller::FailMessage($validate->errors()->first());
            return;
        }

        $product = Product::find($this->product["id"]);
        if($product!=null){
            if($this->photo){
                $res = FirebaseService::uploadFile("images", $this->photo);
                if($res==null){
                    return;
                }
                $this->image = $res;
                FirebaseService::deleteFile("images", $this->image);
            }
            $product->name = $this->name;
            $product->price = $this->price;
            $product->description = $this->description;
            $product->image = $this->image;
            $product->save();
            $this->emit('updated', $product->id);
            Controller::SuccessMessage("Save product success");
            $this->closeModal();
        }
        else{
            Controller::FailMessage("Save product failed");
        }
    }
    public function destroy(){
        $product = Product::find($this->product["id"]);
        if($product!=null){
            $product->delete();
            $this->emit("all");
            Controller::SuccessMessage("Delete product success");
            $this->closeModal();
        }
        else{
            Controller::FailMessage("Delete product failed");
        }
    }


    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
