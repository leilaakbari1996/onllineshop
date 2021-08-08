<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\propertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propertyGroups.index',[
            'properties' => propertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.propertyGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(propertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(propertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, propertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(propertyGroup $propertyGroup)
    {
        //
    }
}
