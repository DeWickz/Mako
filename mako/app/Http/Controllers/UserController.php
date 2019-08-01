<?php

namespace App\Http\Controllers;
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

class UserController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
        ->paginate(4);
        return view('\user\showproduct',compact('products'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($request)
    {
        $allproducts = Product::all()
        ->where('id','=', $request);

        $productslist = DB::table('products')
        ->where('group_id','=', $request)
        ->paginate(4);

        $groupID = DB::table('products')
        ->select('group_id')
        ->where('id', '=', $request)
        ->pluck('group_id');

        $relatedproducts = DB::table('products')
        ->select('product_name','group_id','id','product_price')
        ->where('group_id','=', $groupID)
        ->get();

        $groups = Group::all();

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
                return view('\user\showproduct',compact('user_detail','productslist',
                'groupID','relatedproducts','groups','allproducts'));
            }
            else
            {
                return view('\user\showproduct',compact('user_detail','productslist',
                'groupID','relatedproducts','groups','allproducts'));
            }
        }
        else
        {
            if($basket->isEmpty())
            {
                ShoppingCart::store(Auth::id());
                return view('\user\showproduct',compact('user_detail','productslist',
                'groupID','relatedproducts','groups','allproducts'));
            }
            else
            {
                DB::table('shoppingcart')
                ->where('identifier', '=', Auth::id())->delete();
                ShoppingCart::store(Auth::id());
                return view('\user\showproduct',compact('user_detail','productslist',
                'groupID','relatedproducts','groups','allproducts'));
            }
        }

    }

    public function profile()
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $user = DB::table('users')->get();
        $groups = DB::table('groups')->get();

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.userinfo',compact('user','groups','user_detail'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.userinfo',compact('user','groups','user_detail'));
        }
    }

    public function userinfo(){
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $users = User::all();
        $current_user = Auth::user();
        $groups = DB::table('groups')
        ->paginate(8);
        $allproducts = Product::all();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.userinfo',compact('users','current_user','groups','allproducts'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.userinfo',compact('users','current_user','groups','allproducts'));
        }


    }
    public function personal(){
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.personal',compact('users','current_user'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.personal',compact('users','current_user'));
        }

    }
    public function addressbook(){
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $current_user = Auth::user();
        $user_id = Auth::id();

        $user_address = DB::table('addresses')
        ->where('id','=',$user_id)
        ->get();
        // dd($user_address);
        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());
            return view('profile.address.addressbook',compact('user_address','current_user'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());
            return view('profile.address.addressbook',compact('user_address','current_user'));
        }

    }
    public function payment(){
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $users = User::all();
        $current_user = Auth::user();

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.payment',compact('current_user'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.payment',compact('current_user'));
        }

    }

    public function editPersonal(User $current_user, $id)
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $current_user = Auth::user();
        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.editPersonal',compact('current_user'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.editPersonal',compact('current_user'));
        }
    }

    public function updatePersonal(Request $request, User $current_user)
    {
        ShoppingCart::destroy();
        ShoppingCart::restore(Auth::id());

        $current_user = Auth::user();
        $current_user->update($request->all());

        $basket = DB::table('shoppingcart')
        ->where('identifier','=',Auth::id())
        ->get();

        if($basket->isEmpty())
        {
            ShoppingCart::store(Auth::id());

            return view('profile.personal',compact('current_user'));
        }
        else
        {
            DB::table('shoppingcart')
            ->where('identifier', '=', Auth::id())->delete();
            ShoppingCart::store(Auth::id());

            return view('profile.personal',compact('current_user'));
        }
    }

    public function store(Request $request)
    {
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $user = new User;
        $user->group_name = $request->input('user_firstname');

        $user->save();
        return  redirect()->route('profile.personal');

    }

}
