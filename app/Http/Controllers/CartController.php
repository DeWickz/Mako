<?php

namespace App\Http\Controllers;

use App\Product;
use App\Group;
use DB;
use App\Cart;
use App\CartItem;
use Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_ids = DB::table('shoppingcart')
        ->select('identifier')
        ->get();

        $user_names = DB::table('users')
        ->join('shoppingcart', 'users.id', '=', 'shoppingcart.identifier')
        ->select('users.user_firstname','users.user_lastname','shoppingcart.identifier')
        ->get();
        return view('admin.cart.index',compact('user_ids','user_names'));

    }

    public function editCart($identifier)
    {
        // $username = DB::table('users')
        // ->where('id','=',$identifier)
        // ->get();

        // ShoppingCart::restore($identifier);

        // dd(ShoppingCart::content());
        // return view('admin.cart.editcart',compact('username'));
        return back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $car = new Cart::;
        // $car->product_id = $request->input('product_id');
        // $car->user_id = $request->input('user_id');

        // $car->save();
        // Alert::success('Item added into cart', '1 item added');
        // return  redirect()->route('admin.products.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $oart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        // dd($cart_items);
        $cart_items= DB::table('cart_items')
        ->where('user_id','=',$user_id)
        ->paginate(5);

        $product_id = DB::table('cart_items')
        ->select('product_id')
        ->groupBy('product_id')
        ->get();

        $product_id->toArray();

        $cart_user = DB::table('users')
        ->select('user_firstname','user_lastname')
        ->where('id','=',$user_id)
        ->get();

        $products = collect();

        foreach($product_id as $id)
        {
            $product = DB::table('products')
            ->select('product_name','id')
            ->where('id','=',(array)$id)
            ->get();

            $products->push($product);
        }

        $cartproducts = $products->collapse();

        // dd($cartproducts);

        return view('admin.cart.editcart', compact('cart_items','cart_user','product_id','cartproducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_items = DB::table('cart_items')
        ->where('product_id','=',$id)
        ->delete();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }

        return back();
    }


    public function add(Request $request)
    {}

    public function addtocart()
    {}
}
