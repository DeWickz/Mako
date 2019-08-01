<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    public function users()
    {
        return $this->belongsTo(\App\User::class);
    }

}
