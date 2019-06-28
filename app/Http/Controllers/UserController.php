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

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('\user\showproduct',compact('products'));
    }

    public function show($request)
    {
        $pro = Product::all()
        ->where('group_id','=', $request);
    // dd($pro);
    //เอาข้อมูลออกไม่ได้ท่าใช้ request
        return view('\user\showproduct',compact('pro'));


    }

    public function view($request)
    {
        $pro = Product::all()
            ->where('id','=', $request);
        return view('\user\showproduct',compact('pro'));
    }
}
