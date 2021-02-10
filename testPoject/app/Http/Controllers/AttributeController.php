<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttributeController extends Controller
{
    public function __construct()
    {
            $this->authorizeResource(Attribute::class, 'attributes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get('http://api.ipify.org')->body();
        return view("attribute",compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {
        $attribute = new Attribute();
        $attribute->object_id = $request->object_id;
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
}
