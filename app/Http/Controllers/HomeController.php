<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        auth()->user()->assignRole('admin');
        if(auth()->user()->hasRole('admin'))
        {
            auth()->user()->syncPermissions(['add_product','delete_product','edit_product','view_product','view_order']);
            $products = DB::table('products')
            ->select(DB::raw('count(*) as products_count'))
            ->get();
            return view('adminhome','products');
        }
        else
        {
            auth()->user()->givePermissionTo('view_product');
            return view('home');
        }

        // auth()->user()->removeRole('customer');
        // auth()->user()->assignRole('admin');
        // $user = auth()->user();
        // $user->syncPermissions();
        // $user->revokePermissions();
    }
}
