<?php

namespace App\Http\Controllers;
use App\Product;
use App\Group;
use App\Cart;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Contracts\Buyable;


class ViewProductController extends Controller
{
    public function show()
    {
        $products = DB::table('products')
        ->paginate(12);
        return view('\user\showallproducts',compact('products'));
    }


}
