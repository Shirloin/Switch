<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $table = "transaction_headers";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $cast = [
        "id" => "string",
        "user_id" => "string",
        "date" => "string"
    ];
    public $fillable = [
        "id",
        "user_id",
        "date"
    ];
    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}
