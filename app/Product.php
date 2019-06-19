<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','product_code','product_price','product_detail', 'product_createdBy',
        'product_brand','product_group','product_warranty','product_model'
    ];
}
