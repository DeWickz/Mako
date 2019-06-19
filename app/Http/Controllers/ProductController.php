<?php

namespace App\Http\Controllers;
use App\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = request()->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_code' => ['required', 'integer',],
            'product_price' => ['required', 'integer',],
            'product_detail' => ['required', 'string', 'max:255'],
            'product_createdBy' => ['required', 'string', 'max:255'],
            'product_brand' => ['required', 'string', 'max:255'],
            'product_group' => ['required', 'string', 'max:255'],
            'product_warranty' => ['required', 'string', 'max:255'],
            'product_model' => ['required', 'string', 'max:255'],
        ]);

        \App\Product::create($product);
        return  redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        Alert::success('Success Title', 'Success Message');
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
        #####dropzone still bugged in products.create######
    }
}
