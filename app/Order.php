<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_name','order_code','order_date','order_user_id','order_PaymentMethod'];

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}


