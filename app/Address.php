<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address_moo','address_soi','address_houseNo','address_district',
        'address_province', 'address_city', 'address_state','address_country', 'address_postal_code'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
