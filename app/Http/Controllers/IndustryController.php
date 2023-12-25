<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Industry;

class IndustryController extends Controller
{
    //

    public function index()
    {
        return Industry::all();
    }
    
    public function store(Request $request)
    {
        $industry = Industry::create($request->all());
    
        return response()->json($industry, 201);
    }
    
    public function show(Industry $industry)
    {
        return response()->json($industry);
    }
    
    public function update(Request $request, Industry $industry)
    {
        $industry->update($request->all());
    
        return response()->json($industry);
    }
    
    public function destroy(Industry $industry)
    {
        $industry->delete();
    
        return response()->json(null, 204);
    }
}
