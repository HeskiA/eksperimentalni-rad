<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Industry2;


class Industry2Controller extends Controller
{
    //
    public function index()
    {
        return Industry2::all();
    }
    
    public function store(Request $request)
    {
        $industry = Industry2::create($request->all());
    
        return response()->json($industry, 201);
    }
    
    public function show(Industry2 $industry)
    {
        return response()->json($industry);
    }
    
    public function update(Request $request, Industry2 $industry)
    {
        $industry->update($request->all());
    
        return response()->json($industry);
    }
    
    public function destroy(Industry2 $industry)
    {
        $industry->delete();
    
        return response()->json(null, 204);
    }
}
