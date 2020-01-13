<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $hidden = [];
    protected $fillable = ['order_date',
                            'items',
                            'total',
                            'observations',
                            'customer_id',
                            'payment_id'];

    public function items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

}
