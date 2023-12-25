<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Position2;


class Position2Controller extends Controller
{
    //
    public function index()
    {
        return Position2::all();
    }
    
    public function store(Request $request)
    {
        $position = Position2::create($request->all());
    
        return response()->json($position, 201);
    }
    
    public function show(Position2 $position)
    {
        return response()->json($position);
    }
    
    public function update(Request $request, Position2 $position)
    {
        $position->update($request->all());
    
        return response()->json($position);
    }
    
    public function destroy(Position2 $position)
    {
        $position->delete();
    
        return response()->json(null, 204);
    }
}
