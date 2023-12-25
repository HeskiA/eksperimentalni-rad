<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Education;

class EducationController extends Controller
{
    //

    public function index()
    {
        return Education::all();
    }
    
    public function store(Request $request)
    {
        $education = Education::create($request->all());
    
        return response()->json($education, 201);
    }
    
    public function show(Education $education)
    {
        return response()->json($education);
    }
    
    public function update(Request $request, Education $education)
    {
        $education->update($request->all());
    
        return response()->json($education);
    }
    
    public function destroy(Education $education)
    {
        $education->delete();
    
        return response()->json(null, 204);
    }
}
