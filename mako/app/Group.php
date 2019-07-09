<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_product_id','group_name'];

    protected function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    protected function types()
    {
        return $this->hasMany(\App\Type::class);
    }

}


