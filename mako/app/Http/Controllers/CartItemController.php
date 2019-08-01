<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Product;
use App\CartItem;
use App\Group;
use App\Order;
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

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        $total_price = ShoppingCart::total();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());
            return view('cart', compact('groups','user_detail','total_price'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());
            return view('cart', compact('groups','user_detail','total_price'));
        }
    }

    public function cart_delete($id)
    {
        ShoppingCart::remove($id);

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return back();
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return back();
        }
    }

    public function incr($id, $qty)
    {
        ShoppingCart::update($id, $qty + 1);

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return back();
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return back();
        }

    }

    public function decr($id, $qty)
    {
        ShoppingCart::update($id, $qty - 1);

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return back();
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return back();
        }
    }

    public function upd()
    {
        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::restore(Auth::id());
            ShoppingCart::store(Auth::id());
            return back();
        }
        else
        {
            ShoppingCart::destroy();
            ShoppingCart::restore(Auth::id());
            ShoppingCart::store(Auth::id());
            return back();
        }
    }

    public function checkout()
    {

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $groups = Group::all();
        // ShoppingCart::store(Auth::id());

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        $total_price = ShoppingCart::total();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());
            return view('checkout', compact('groups','user_detail','total_price'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());
            return view('checkout', compact('groups','user_detail','total_price'));
        }

    }

    public function purchase()
    {
        $time = Carbon::now()->tz('Asia/Bangkok')->toDateTimeString();
        $arr = array(Auth::id(),Carbon::now()->timestamp);
        $key = implode("_",$arr);
        $code = implode("",$arr);

        ShoppingCart::store($code);
        // dd(ShoppingCart::content());
        $ord = new Order;
        $ord->order_name = $key;
        $ord->order_code = $code;
        $ord->order_date = $time;
        $ord->order_user_id = Auth::id();
        $ord->order_PaymentMethod = 'none';
        $ord->order_status = "pending";
        $ord->save();

        ShoppingCart::destroy();
        // dd(ShoppingCart::content());
        return redirect()->route('welcome');
    }


}
