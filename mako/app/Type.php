<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type_name'];

    public function group()
    {
        return $this->belongsTo(\App\Group::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Products::class);
    }
}
