<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'payment_type','payment_date','payment_time','payment_slip','payment_amount'
    ];
}
