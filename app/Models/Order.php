<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderItem;

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

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
