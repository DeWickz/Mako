<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //$test = "Add products";
        //dd($test);
        return view('addproduct');
    }



    public function store(Request $request)
    {
    Product::create($request->all());
    return redirect()->route('adminhome'); // บัตเก้บข้อมูล
    }








}
