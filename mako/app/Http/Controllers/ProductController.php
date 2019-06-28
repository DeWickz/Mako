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


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id = null)
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
        $pro = Product::all()
            ->where('group_id','=', $request);
        // dd($pro);
        //เอาข้อมูลออกไม่ได้ท่าใช้ request
        return view('\user\showgroup',compact('pro'));


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
        dd($pro);
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
}

        //if($request->hasFile('product_images')){
        //    $filenameWithExt = $request->file('product_images')->getClientOriginalName();

        //    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         //   $extension = $request->file('product_images')->getClientOriginalExtension();

         //   $fileNameToStroe = $filename.'_'.time().'.'.$extension;

          //  $path = $request->file('product_images')->storeAs('public/product_images',$fileNameToStroe);

         // }
