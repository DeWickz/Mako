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
use Gloudemans\Shoppingcart\Contracts\Buyable;


class ViewProductController extends Controller
{
    public function show()
    {
        if (!Session::has('cart')){
            $user_id = Auth::id();

            $user_detail = DB::table('users')
            ->where('id','=',$user_id)
            ->get();
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $productslist = DB::table('products')
            ->paginate(12);
            return view('\user\showallproducts', compact('user_detail','users','current_user','groups','productslist'));
        }
        $groups = Group::all();

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;

        $total = [0];

        $allproducts = Product::all();

        foreach($allproducts as $product)
        {
            $total[0] += $product['price']*$product['qty'];
        }

        $productslist = DB::table('products')
        ->paginate(12);
        return view('\user\showallproducts',compact('productslist', 'user_detail','products','productslist','total',
                                                    'groups','allproducts'));
    }


}
