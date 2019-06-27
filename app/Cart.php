<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [];
    //
    public function products()
    {
        return $this->hasMany(\App\Product::class);
    }

    public function user()
    {
        return $this->hasMany(\App\User::class);
    }
}
