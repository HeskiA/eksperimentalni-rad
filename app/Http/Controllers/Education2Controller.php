<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Education2;


class Education2Controller extends Controller
{
    //

    public function index()
    {
        return Education2::all();
    }
    
    public function store(Request $request)
    {
        $education = Education2::create($request->all());
    
        return response()->json($education, 201);
    }
    
    public function show(Education2 $education)
    {
        return response()->json($education);
    }
    
    public function update(Request $request, Education2 $education)
    {
        $education->update($request->all());
    
        return response()->json($education);
    }
    
    public function destroy(Education2 $education)
    {
        $education->delete();
    
        return response()->json(null, 204);
    }
}
