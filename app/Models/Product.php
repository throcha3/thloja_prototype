<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['description',
                           'description_2',
                           'supplier',
                           'subcategory_id',
                           'photo_url',
                           'price',
                           'cost_price'
                        ];
}
