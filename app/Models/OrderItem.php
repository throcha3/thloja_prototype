<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{

    protected $fillable = ['order_id',
                            'product_id',
                            'amount',
                            'price',
                            'total_price'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
