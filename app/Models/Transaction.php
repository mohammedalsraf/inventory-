<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['item_id','type', 'quantity'];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
