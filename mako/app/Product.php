<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "product";
    protected $fillable = [
        'product_id','product_name','product_code','product_price','product_detail', 'product_createdBy', 'product_brand','product_group'
    ];
}
