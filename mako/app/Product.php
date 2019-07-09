<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','product_code','product_price','product_detail', 'product_createdBy',
        'product_brand','product_group','product_warranty','product_model','product_images'
    ];

    public function group()
    {
        return $this->belongsTo(\App\Group::class);
    }

    public function type()
    {
        return $this->belongsTo(\App\Type::class);
    }

    // public function cart()
    // {
    //     return $this->hasOne(\App\Cart::class);
    // }
}
