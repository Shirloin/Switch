<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    protected $keyType = 'string';
    protected $fillable = [
        "id",
        "name"
    ];

    public function Products(){
        return $this->hasMany(Product::class);
    }
}
