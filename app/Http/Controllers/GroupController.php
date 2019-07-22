<?php

namespace App\Http\Controllers;

use App\Group;
use App\Product;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole("admin")){
            $groups= DB::table('groups')
            ->paginate(5);

            return view('admin.groups.index',compact('groups'));
        }
        else
        {
            return view('errors');
        }



        // $groups = Group::all();
        // return view('admin.groups.index', compact('groups'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id = null)
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = request()->validate([
            'group_name' => ['required', 'string', 'max:255'],
            'group_product_id' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'string', 'max:255'],
        ]);

        $gro = new Group;
        $gro->group_name = $request->input('group_name');
        $gro->group_product_id = $request->input('group_product_id');
        $gro->product_id = $request->input('product_id');

        $gro->save();
        return  redirect()->route('admin.groups.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        Alert::success('Successfully updated', 'Group name updated');
        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('admin.groups.index');
    }
}
