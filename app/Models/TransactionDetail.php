<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "transaction_id",
        "product_id",
        "quantity"
    ];
    protected $cast = [
        "transaction_id" => "string",
        "product_id" => "string",
        "quantity" => "integer"
    ];
    public function TransactionHeader(){
        return $this->belongsTo(TransactionHeader::class, "transaction_id");
    }
    public function Product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
