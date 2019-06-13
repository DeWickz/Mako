<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        //$test = "Add products";
        //dd($test);
        $products = Product::all();
        return view('viewproduct',compact('products'));
    }

    public function test()
    {
        return view('addproduct');
    }


    public function edit(Product $s)
    {
        return view('proedit',compact('s'));
    }


    public function update(Request $request,Product $s)
    {
      $s->update($request->all());
      return redirect()->route('admin.addproduct.index');
    }



    public function store()
    {
        $product = request()->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'product_code' => ['required', 'integer',],
            'product_price' => ['required', 'integer',],
            'product_detail' => ['required', 'string', 'max:255'],
            'product_createdBy' => ['required', 'string', 'max:255'],
            'product_brand' => ['required', 'string', 'max:255'],
            'product_group' => ['required', 'string', 'max:255'],
        ]);

        \App\Product::create($product);
        return view('adminhome');
    }


    public function destroy(Product $product)
    {
        $product->delete();
      return redirect()->route('products');
    }










    // public function store(Request $request)
    // {
    //     Product::create($request->all());
    //     return redirect()->route('addproduct.index'); // บัตเก้บข้อมูล
    // }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'product_name' => ['required', 'string', 'max:255'],
    //         'product_code' => ['required', 'string', 'max:255'],
    //         'product_price' => ['required', 'integer', 'max:255'],
    //         'product_detail' => ['required', 'string', 'max:255'],
    //         'product_createdBy' => ['required', 'string', 'max:255'],
    //         'product_brand' => ['required', 'string', 'max:255'],
    //         'product_group' => ['required', 'string', 'max:255'],
    //     ]);
    // }
    
    
}
