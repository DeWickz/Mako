<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0,
                       'price' => $item->product_price,
                       'item' => $item,
                       'total' => 0];
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->product_price;
        $storedItem['total'] = $storedItem['price'] * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->product_price;

        // dd($storedItem['price']);
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <= 0)
        {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQty-= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['total'];
        unset($this->items[$id]);
    }
}
//the relationships (keep for now)
    // protected $fillable = [];

    // public function products()
    // {
    //     return $this->hasMany(\App\Product::class);
    // }

    // public function user()
    // {
    //     return $this->hasMany(\App\User::class);
    // }
