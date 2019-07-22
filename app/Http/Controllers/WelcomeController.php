<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use App\Group;
use App\Product;
use App\Cart;
use App\Http\Controllers\Controller;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;
// use App\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $allproducts = DB::table('products')->paginate(8);
        $user_id = Auth::id();
        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if(Auth::guest())
        {
            if($basket->isEmpty())
            {
                return view('welcome',compact('groups','user_detail',
                                        'allproducts'));
            }
            else
            {
                return view('welcome',compact('groups','user_detail',
                                        'allproducts'));
            }
        }
        else
        {
            if($basket->isEmpty())
            {
                ShoppingCart::store(Auth::id());
                return view('welcome',compact('groups','user_detail',
                                        'allproducts'));
            }
            else
            {
                DB::table('shoppingcart')
                ->where('identifier', '=', Auth::id())->delete();
                ShoppingCart::store(Auth::id());
                return view('welcome',compact('groups','user_detail',
                           'allproducts'));
            }
        }


        // dd($cart);
    }

    public function cart()
    {
        if (!Session::has('cart')){
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $total = [0];

        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }

        $groups = Group::all();
        return view('shoppingCart', compact('products','totalPrice','groups','total'));
    }
}
  // $groups = Groupd::all();
        // if(auth()->user()->hasRole("admin")){
        //     $proucts= DB::table('products')
        //     ->paginate(8);


        //     return view('welcome',compact('products','groups'));
        // }
        // else
        // {
        //     $products= DB::table('products')
        //     ->paginate(8);
        //     return view('welcome', compact('products',groups'));
        // }

        // $groups = Group::all();
        // $products = Product::all();
        // return view('welcome', compact('groups', 'products'));

        // {
        //     if(1){
        //         $products= DB::table('products')
        //         ->paginate(5);


        //         return view('admin.products.index',compact('products'));
        //     }
        //     else
        //     {
        //         return view('errors');
        //     }
