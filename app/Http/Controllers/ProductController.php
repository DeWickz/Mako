<?php

namespace App\Http\Controllers;
use App\Product;
use App\Group;
use App\Cart;
use App\CartItem;
use App\Order;
use DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole("admin")){
            $products= DB::table('products')
            ->paginate(4);


            return view('admin.products.index',compact('products'));
        }
        else
        {
            return view('home');
        }

        // $products = Product::all();
        // return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return view('admin.products.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $pro = request()->validate([
        //     'product_name' => ['required', 'string', 'max:255'],
        //     'product_code' => ['required', 'integer',],
        //     'product_price' => ['required', 'integer',],
        //     'product_detail' => ['required', 'string', 'max:255'],
        //     'product_createdBy' => ['required', 'string', 'max:255'],
        //     'product_brand' => ['required', 'string', 'max:255'],
        //     'product_group' => ['required', 'string', 'max:255'],
        //     'product_warranty' => ['required', 'string', 'max:255'],
        //     'product_model' => ['required', 'string', 'max:255'],
        //     'product_images' => ['required', 'string', 'max:255'],
        //     'group_id' => ['required', 'integer',],
        // ]);

        $pro = new Product;
        $pro->product_name = $request->input('product_name');
        $pro->product_code = $request->input('product_code');
        $pro->product_price = $request->input('product_price');
        $pro->product_detail = $request->input('product_detail');
        $pro->product_createdBy = $request->input('product_createdBy');
        $pro->product_brand  = $request->input('product_brand');
        $pro->product_group = $request->input('product_group');
        $pro->product_warranty = $request->input('product_warranty');
        $pro->product_model = $request->input('product_model');
        $pro->product_images = $request->input('product_images');
        $pro->group_id = $request->input('group_id');
        $pro->save();
        //$pro->product_images = $fileNameToStroe;


        // ]);
        //         dd($pro);

        //if($request->hasFile('product_images')){
        //    $filenameWithExt = $request->file('product_images')->getClientOriginalName();

        //    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         //   $extension = $request->file('product_images')->getClientOriginalExtension();

         //   $fileNameToStroe = $filename.'_'.time().'.'.$extension;

          //  $path = $request->file('product_images')->storeAs('public/product_images',$fileNameToStroe);

         // }
        // dd($pro);
        return  redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {

        $allproducts = Product::all()
        ->where('id','=', $request);

        $productslist = DB::table('products')
        ->where('group_id','=', $request)
        ->paginate(12);

        $groupID = DB::table('products')
        ->select('group_id')
        ->where('id', '=', $request)
        ->pluck('group_id');

        $groupname = DB::table('groups')
        ->select('group_name')
        ->where('id','=',$request)
        ->get();

        $relatedproducts = DB::table('products')
        ->select('product_name','group_id','id','product_price')
        ->where('group_id','=', $groupID)
        ->get();

        $groups = Group::all();
        $user_id = Auth::id();

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();


        return view('\user\showgroup',compact('allproducts','productslist','groupID',
                                              'relatedproducts','groupname',
                                              'groups',
                                              'user_detail',
                                               ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //dd($products);
        return view('admin.products.edit',compact('product'));

    }

    public function view($request)
    {
        $pro = Product::all()
            ->where('id','=', $request);
        // dd($pro);
        return view('admin.products.viewproduct',compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        // Alert::success('Successfully updated', 'Product info updated');
        Alert::image('Successfully updated', 'Product info updated', 'https://backgroundcheckall.com/wp-content/uploads/2018/10/pepehands-transparent-background-3-300x200.png',
                     '300', '600');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();

        return redirect()->route('admin.products.index');
    }

    // public function Dropzone(Request $request)
    // {
    //     $file = $file('file');
    // }

    public function uploadFiles(Request $request)
    {
    	if($request->hasFile('file'))
    	{
    		$imageFile = $request->file('file');
    		$imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('uploads'), $imageName);
    	}
		return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);

		//save file name + file id into database

    }

    public function addtocart(Request $request, $id)
    {
        $product = Product::find($id);
        $user_id = Auth::id();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        // $pro = new Order;
        // $pro->product_name = $request->input('product_name');
        // $pro->product_code = $request->input('product_code');
        // $pro->product_price = $request->input('product_price');
        // $pro->product_detail = $request->input('product_detail');
        // $pro->product_createdBy = $request->input('product_createdBy');
        // $pro->product_brand  = $request->input('product_brand');
        // $pro->product_group = $request->input('product_group');
        // $pro->product_warranty = $request->input('product_warranty');
        // $pro->product_model = $request->input('product_model');
        // $pro->product_images = $request->input('product_images');
        // $pro->group_id = $request->input('group_id');
        // $pro->save();

        $cartItem = new CartItem;
        $cartItem->product_id = $product->id;
        $cartItem->user_id = $user_id;
        $cartItem->cart_item_price = $product->product_price;
        $cartItem->cart_item_qty = 1;

        $cartItem->save();

        $request->session()->put('cart',$cart);

        // dd($cart);
        // dd($request->session()->get('cart'));
        return back();


    }

    public function addtocart2(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('shoppingCart');
    }

    public function reducebyone($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

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

    public function removeitem($id)
    {
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

    public function cart()
    {
        $user_id = Auth::id();
        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();


        if (!Session::has('cart')){
            $groups = Group::all();

            $user_id = Auth::id();

            $user_detail = DB::table('users')
            ->where('id','=',$user_id)
            ->get();

            return view('shoppingCart', compact('user_detail','groups'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $total = [0];

        foreach($products as $product)
        {
            $total[0] += $product['price']*$product['qty'];
        }

        $groups = Group::all();
        // dd($oldCart);
        return view('shoppingCart', compact('products','totalPrice','groups','total','user_detail'));
    }


    public function checkout()
    {
        if (!Session::has('cart')){
            $groups = Group::all();
            $user_id = Auth::id();

            $user_detail = DB::table('users')
            ->where('id','=',$user_id)
            ->get();
            return view('shoppingCart',compact('groups','user_detail'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        $groups = Group::all();
        $user_id = Auth::id();

        // SAVING ORDERS TEST
        // try{
        //     $order = new Order;
        // }catch (\Exception $e){
        //     return back();
        // }

        $user_detail = DB::table('users')
        ->where('id','=',$user_id)
        ->get();
        return view('checkout', compact('total','products','groups','user_detail'));
    }
}

        //if($request->hasFile('product_images')){
        //    $filenameWithExt = $request->file('product_images')->getClientOriginalName();

        //    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         //   $extension = $request->file('product_images')->getClientOriginalExtension();

         //   $fileNameToStroe = $filename.'_'.time().'.'.$extension;

          //  $path = $request->file('product_images')->storeAs('public/product_images',$fileNameToStroe);

         // }
