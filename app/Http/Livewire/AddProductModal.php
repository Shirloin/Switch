<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Str;

class AddProductModal extends ModalComponent
{
    protected $listeners = ['updateCategory' => 'setCategory'];
    public $name;
    public $price;
    public $description;
    public $image = "https://dmarket.com/blog/dota2-skins-best-sellers-2020/1.jpg";
    public $category;
    public $search = '';
    public function render()
    {
        $categories = ProductCategory::search($this->search)->get();
        return view('livewire.add-product-modal', ['categories' => $categories]);
    }

    public function save()
    {

        $validate = Validator::make(['name' => $this->name, 'price' => $this->price, 'description' => $this->description, 'category' => $this->category], [
            'name' => 'required|min:3|max:50',
            'price' => 'required|min:1|numeric',
            'description' => 'required|min:5',
            'category' => 'required'
        ]);
        if ($validate->fails()) {
            Controller::FailMessage($validate->errors()->first());
            return;
        }
        $product = new Product();
        $product->id = Str::uuid();
        $product->user_id = Auth::user()->id;
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->image = $this->image;
        $product->product_category_id = $this->category;
        $product->stock = 50;
        $product->save();
        $this->emit('all');
        Controller::SuccessMessage("Add product success");
        $this->closeModal();
    }

    public function setCategory($categoryId)
    {
        $this->category = $categoryId;
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
