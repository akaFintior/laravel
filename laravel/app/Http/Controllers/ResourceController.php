<?php

namespace App\Http\Controllers;

use App\News;
use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.resources.index', [
            'resources' => Resource::query()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Resource $resource)
    {
        return view('admin.resources.createResource', ['resource' => $resource]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new Resource();
        $res->fill($request->all())->save();
        return redirect()->route('resources.index')->with('success', 'Ресурс успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Resource::find($id);
        return view('admin.resources.editResource', ['resource' => $res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = Resource::find($id);
        $res->fill($request->all())->save();

        return redirect()->route('resources.index')->with('success', 'Ресурс успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Resource::find($id);
        $res->delete();
        return redirect()->route('resources.index')->with('success', 'Ресурс успешно удален!');
    }
}
