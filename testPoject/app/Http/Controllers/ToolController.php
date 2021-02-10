<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Models\Tool;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tool::class, 'tools');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToolRequest $request)
    {
        $tool = new Tool();
        $tool->name = $request->tool;
        $tool->user_id = Auth::user()->id;
        $tool->save();

        return redirect()->action([DashboardController::class, 'index']);
    }
}
