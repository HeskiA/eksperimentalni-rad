<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Region2;


class Region2Controller extends Controller
{
    //
    public function index()
    {
        return Region2::all();
    }
    
    public function store(Request $request)
    {
        $region = Region2::create($request->all());
    
        return response()->json($region, 201);
    }
    
    public function show(Region2 $region)
    {
        return response()->json($region);
    }
    
    public function update(Request $request, Region2 $region)
    {
        $region->update($request->all());
    
        return response()->json($region);
    }
    
    public function destroy(Region2 $region)
    {
        $region->delete();
    
        return response()->json(null, 204);
    }
}
