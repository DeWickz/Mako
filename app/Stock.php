<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'stock_product_id','stock_amount','stock_sn','stock_in','stock_out'];
}
