<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://api.ipify.org');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("attribute");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $object_id = Tool::where('user_id', $user->id)->orderBy('id','desc')->first(); //Get the id of the last object

        $attribute = new Attribute();
        $attribute->object_id = $object_id->id;
        $attribute->name = $request->name;
        $attribute->company = $request->company;
        $attribute->representative_name = $request->representative_name;
        $attribute->nr_telephone_representative = $request->nr_telephone_representative;
        $attribute->validity_start_date = $request->validity_start_date;
        $attribute->expiration_date = $request->expiration_date;
        $attribute->active = 1; //Default is 1
        $attribute->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
