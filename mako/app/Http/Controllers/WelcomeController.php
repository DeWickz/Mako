<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Product;
use App\Http\Controllers\Controller;
// use App\Product;


class WelcomeController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $products = Product::all();
        return view('welcome', compact('groups', 'products'));
    }
}
