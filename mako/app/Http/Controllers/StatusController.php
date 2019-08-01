<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Product;
use App\Group;
use App\Cart;
use App\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;

class StatusController extends Controller
{
    public function allOrders()
    {
        // dd(Carbon::now());

        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->get();

        // dd($orders);

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.status.allOrders',compact('current_user','orders'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.status.allOrders',compact('current_user','orders'));
        }
    }
    public function payPending()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->where('order_status','=','pending')
        ->get();

        // dd($orders);

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.status.payPending',compact('current_user','orders'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.status.payPending',compact('current_user','orders'));
        }
    }
    public function paidOrders()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->where('order_status','=','paid')
        ->get();

        // dd($orders);

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.status.paidOrders',compact('current_user','orders'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.status.paidOrders',compact('current_user','orders'));
        }
    }
    public function deliveryPending()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->where('order_status','=','delivpending')
        ->get();

        // dd($orders);

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.status.deliveryPending',compact('current_user','orders'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.status.deliveryPending',compact('current_user','orders'));
        }
    }
    public function received()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->where('order_status','=','received')
        ->get();

        // dd($orders);

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.status.received',compact('current_user','orders'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.status.received',compact('current_user','orders'));
        }
    }


    public function viewOrder($id)
    {
        $current_user = Auth::user();
        $viewing = ShoppingCart::restore($id);
        $viewing = ShoppingCart::store($id);
        $viewing = ShoppingCart::content();

        $orders = DB::table('orders')
        ->join('shoppingcart','orders.order_code','=','shoppingcart.identifier')
        ->where('order_user_id','=',Auth::id())
        ->get();
        // $viewing->join($orders);
        // dd($viewing);
        $basket = DB::table('shoppingcart')
        ->where('identifier','=',$id)
        ->get();

        return view('profile.orderitems',compact('current_user','viewing'));

        // if($basket->isEmpty())
        // {
        //     ShoppingCart::store($id);

        //     return view('profile.orderitems',compact('current_user','viewing'));
        // }
        // else
        // {
        //     DB::table('shoppingcart')
        //     ->where('identifier', '=', Auth::id())->delete();
        //     ShoppingCart::store($id);

        //     return view('profile.orderitems',compact('current_user','viewing'));
        // }
        // dd($viewing);

    }

}
