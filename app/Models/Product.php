<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $keyType = 'string';
    protected $fillable = [
        "name",
        "price",
        "description",
        "stock",
        "image",
        "user_id",
        "product_category_id"
    ];
    public function Carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}
