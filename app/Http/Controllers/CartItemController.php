<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\CartItem;
use App\Group;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;

class CartItemController extends Controller
{
    public function add_to_cart()
    {
        $product = Product::find(request()->product_id);

        $cartItem = ShoppingCart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => request()->qty,
            'price' => $product->product_price,
            'weight' => 0,

        ]);

        ShoppingCart::associate($cartItem->rowId, 'App\Product');
        // ShoppingCart::store(Auth::id());
        return back();
    }

    public function cart()
    {
        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $groups = Group::all();
        // ShoppingCart::store(Auth::id());
        return view('cart', compact('groups','user_detail'));
    }

    public function cart_delete($id)
    {
        ShoppingCart::remove($id);
        return back();
    }

    public function incr($id, $qty)
    {
        ShoppingCart::update($id, $qty + 1);
        return back();
    }

    public function decr($id, $qty)
    {
        ShoppingCart::update($id, $qty - 1);
        return back();
    }

    public function upd()
    {
        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::restore(Auth::id());
            return back();
        }
        else
        {
            ShoppingCart::destroy();
            ShoppingCart::restore(Auth::id());
            return back();
        }
    }


}
