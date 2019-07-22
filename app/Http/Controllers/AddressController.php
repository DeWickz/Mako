<?php

namespace App\Http\Controllers;

use Session;
use App\Address;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('cart')){
            $users = User::all();
            $current_user = Auth::user();
            $addresses = Address::all();
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            return view('profile.address.addressbook', compact('users','cart','current_user','addresses'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('profile.address.addaddress',compact('cart'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Session::has('cart')){
            return view('profile.address.addaddress');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = [0];
        foreach($products as $product)
        {
            $total[0] += $product['total'];
        }
        return view('profile.address.addAddress',compact('products','total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
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
        $adr ->user_id = Auth::id();
        $adr ->address_owner = $request->input('address_owner');
        $adr ->address_phone = $request->input('address_phone');
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
        return redirect()->route('profile.addressbook');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('profile.address.editaddress', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        // $address->update($request->all());
        $address->address_owner = $request->input('address_owner');
        $address->address_phone = $request->input('address_phone');
        $address->address_moo = $request->input('address_moo');
        $address->address_soi = $request->input('address_soi');
        $address->address_houseNo = $request->input('address_houseNo');
        $address->address_district = $request->input('address_district');
        $address->address_province = $request->input('address_province');
        $address->address_city = $request->input('address_city');
        $address->address_state = $request->input('address_state');
        $address->address_country = $request->input('address_country');
        $address->address_postal_code = $request->input('address_postal_code');
        $address->save();
        Alert::success('Successfully updated', 'Address updated');
        // dd($address);
        return redirect()->route('profile.addressbook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('profile.addressbook');
    }
}
