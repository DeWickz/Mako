<?php

namespace App\Http\Controllers;
use App\Product;
use App\Group;
use App\Cart;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;
use Gloudemans\Shoppingcart\Contracts\Buyable;


class ViewProductController extends Controller
{
    public function show()
    {
        $groups = Group::all();

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $allproducts = Product::all();

        $productslist = DB::table('products')
        ->paginate(12);

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if(Auth::guest())
        {
            if($basket->isEmpty())
            {
                return view('\user\showallproducts',compact('productslist', 'user_detail','productslist',
                'groups','allproducts'));
            }
            else
            {
                return view('\user\showallproducts',compact('productslist', 'user_detail','productslist',
                'groups','allproducts'));
            }
        }
        else
        {
            if($basket->isEmpty())
            {
                ShoppingCart::store(Auth::id());
                return view('\user\showallproducts',compact('productslist', 'user_detail','productslist',
                'groups','allproducts'));
            }
            else
            {
                DB::table('shoppingcart')
                ->where('identifier', '=', Auth::id())->delete();
                ShoppingCart::store(Auth::id());
                return view('\user\showallproducts',compact('productslist', 'user_detail','productslist',
                'groups','allproducts'));
            }
        }
    }


}
