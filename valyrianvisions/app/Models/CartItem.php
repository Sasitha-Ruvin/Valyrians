<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "carts_items";
    protected $fillable = [
      'cart_id',
      'pro_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
