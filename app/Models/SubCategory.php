<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $hidden = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            //
        });

        self::created(function($model){
            // ... code here
        });
    }
}
