<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = "product_id";
    // protected $primaryKey = ["user_id", "product_id"];
    public $timestamps = false;
    protected $casts = [
        "user_id" => "string",
        "product_id" => "string",
        "quantity" => "integer"
    ];
    protected $fillable = [
        "user_id",
        "product_id",
        "quantity"
    ];
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}
