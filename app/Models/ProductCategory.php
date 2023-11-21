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
    public static function search($query)
    {
        return ProductCategory::where('name', 'like', '%' . $query . '%');
    }
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
