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
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all()
            ->where('id','=', $request);
            $groupID = DB::table('products')
            ->select('group_id')
            ->where('id', '=', $request)
            ->pluck('group_id');
            $relatedproducts = DB::table('products')
            ->select('product_name','group_id','id','product_price')
            ->where('group_id','=', $groupID)
            ->get();
            $user_id = Auth::id();
            $user_detail = DB::table('users')
            ->where('id','=',$user_id)
            ->get();
            return view('\user\showproduct', compact('user_detail','relatedproducts','users','current_user','groups','allproducts'));
        }

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

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;

        $total = [0];

        foreach($products as $product)
        {
            $total[0] += $product['price']*$product['qty'];
        }

        // dd($groupID);
        // $id = $groupID->get('group_id');
        // $test = 1;
        // dd($groupID);

    // dd($pro);
    //เอาข้อมูลออกไม่ได้ท่าใช้ request
        return view('\user\showproduct',compact('user_detail','products','productslist','total',
                                                'groupID','relatedproducts','groups','allproducts'));
    }

    public function profile()
    {
        $user = DB::table('users')->get();
        $groups = DB::table('groups')->get();

        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        return view('userprofile',compact('user','groups','user_detail'));
    }

    public function userinfo(){
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $users = User::all();
        $current_user = Auth::user();
        $groups = DB::table('groups')
        ->paginate(8);
        $allproducts = Product::all();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }

        return view('profile.userinfo', compact('users','current_user','groups','allproducts',
                                                'products','total'));

    }
    public function personal(){
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $users = User::all();
        $current_user = Auth::user();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }

        return view('profile.personal', compact('users','current_user','products','total'));

    }
    public function addressbook(){
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $current_user = Auth::user();
        $addresses = Address::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        // dd($addresses);
        return view('profile.addressbook', compact('current_user','addresses','products','total'));
    }
    public function payment(){
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $users = User::all();
        $current_user = Auth::user();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        return view('profile.payment', compact('users','current_user','products','total'));

    }

    public function editPersonal(User $current_user, $id)
    {
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $current_user = Auth::user();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }

        // Alert::success('Successfully updated', 'Product info updated');
        // Alert::image('Successfully updated', 'Product info updated', 'https://backgroundcheckall.com/wp-content/uploads/2018/10/pepehands-transparent-background-3-300x200.png',
        //              '300', '600');
        return view('profile.editPersonal',compact('current_user','products','total'));
    }

    public function updatePersonal(Request $request, User $current_user)
    {
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $groups = DB::table('groups')
            ->paginate(8);
            $allproducts = Product::all();
            return view('profile.userinfo', compact('users','current_user','groups','allproducts'));
        }
        $current_user->update($request->all());
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        // $current_user = Auth::user();
        // $current_user->update($request->all());
        dd($current_user);
        return view('profile.personal', compact('user','current_user','products','total'));
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

    public function create()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        return view('profile.addAddress','products','total');
    }


    public function addressStore(Request $request)
    {
        $address = request()->validate([
            'address_moo' => ['required', 'string', 'max:255'],
            'address_soi' => ['required', 'string', 'max:255'],
            'address_houseNo' => ['required', 'string', 'max:255'],
            'address_district' => ['required', 'string', 'max:255'],
            'address_province' => ['required', 'string', 'max:255'],
            'address_city' => ['required', 'string', 'max:255'],
            'address_state' => ['required', 'string', 'max:255'],
            'address_country' => ['required', 'string', 'max:255'],
            'address_postal_code' => ['required', 'string', 'max:255'],

        ]);

        $adr = new Address;
        $adr ->address_moo = $request->input('address_moo');
        $adr ->address_soi = $request->input('address_soi');
        $adr ->address_houseNo = $request->input('address_houseNo');
        $adr ->address_district = $request->input('address_district');
        $adr ->address_province = $request->input('address_province');
        $adr ->address_city = $request->input('address_city');
        $adr ->address_state = $request->input('address_state');
        $adr ->address_country = $request->input('address_country');
        $adr ->address_postal_code = $request->input('address_postal_code');


        $adr->save();
        return  redirect()->route('profile.addressbook');

    }



}
