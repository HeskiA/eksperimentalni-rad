<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Region;

class RegionController extends Controller
{
    //
    public function index()
    {
        return Region::all();
    }
    
    public function store(Request $request)
    {
        $region = Region::create($request->all());
    
        return response()->json($region, 201);
    }
    
    public function show(Region $region)
    {
        return response()->json($region);
    }
    
    public function update(Request $request, Region $region)
    {
        $region->update($request->all());
    
        return response()->json($region);
    }
    
    public function destroy(Region $region)
    {
        $region->delete();
    
        return response()->json(null, 204);
    }
}
