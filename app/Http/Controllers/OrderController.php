<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            $orders= DB::table('orders')
            ->join('users','orders.order_user_id','=','users.id')
            ->paginate(10);
            ShoppingCart::store(Auth::id());
            // dd('1');
            return view('admin.orders.index',compact('orders'));
        }
        else
        {
            $orders= DB::table('orders')
            ->join('users','orders.order_user_id','=','users.id')
            ->paginate(10);
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('admin.orders.index',compact('orders'));
        }
        // $orders = Order::all();
        // return view('admin.orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

}
