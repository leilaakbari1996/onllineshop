<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\propertyGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupsRequest;
use App\Models\Property;

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
        return view('admin.propertyGroups.create',[
            'properties' => Property::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PropertyGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyGroupsRequest $request)
    {
        propertyGroup::query()->create([
            'title' => $request->get('title')
        ]);
        session()->flash('success',' گروه ویژگی با موفقیت اضاف شد.');
        return redirect(route('propertyGroups.index'));
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
        return view('admin.propertyGroups.edit',[
            'propertyGroup' => $propertyGroup,
            'properties' => Property::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PropertyGroupsRequest  $request
     * @param  \App\Models\propertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyGroupsRequest $request, propertyGroup $propertyGroup)
    {
        $propertyGroup->update([
            'title' => $request->get('title')
        ]);

        return redirect(route('propertyGroups.index'));
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
