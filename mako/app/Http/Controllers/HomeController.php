<?php

namespace App\Http\Controllers;

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
        // auth()->user()->assignRole('customer');
        if(auth()->user()->hasRole('admin'))
        {
            auth()->user()->syncPermissions(['add_product','delete_product','edit_product','view_product','view_order']);
            return view('adminhome');
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
