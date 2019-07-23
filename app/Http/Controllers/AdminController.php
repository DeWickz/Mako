<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Group;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminController extends Controller
{

    public function dashboard()
    {
        $now = \Carbon\Carbon::now();

        // auth()->user()->assignRole('admin');
        // auth()->user()->assignRole('customer');
        $groups = Group::all();

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        ShoppingCart::restore(Auth::id());

        if(auth()->user()->hasRole("admin")){
            auth()->user()->syncPermissions(['add_product','delete_product','edit_product','view_product','view_order']);

            $count_user = DB::table('users')
            ->select(DB::raw('count(*) as count_user'))
            ->get();

            $count_product = DB::table('products')
            ->select(DB::raw('count(*) as count_product'))
            ->get();

            $count_group = DB::table('groups')
            ->select(DB::raw('count(*) as count_group'))
            ->get();

            // dd($count_product);

            ShoppingCart::store(Auth::id());

            return view('adminhome',compact('count_user','count_product','count_group','groups','user_detail'));
        }
        else{
            ShoppingCart::store(Auth::id());
            auth()->user()->givePermissionTo('view_product');
            return view('home',compact('groups','user_detail'));
        }


    }
}
