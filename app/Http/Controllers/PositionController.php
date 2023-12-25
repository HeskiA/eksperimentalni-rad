<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Position;

class PositionController extends Controller
{
    //
    public function index()
    {
        return Position::all();
    }
    
    public function store(Request $request)
    {
        $position = Position::create($request->all());
    
        return response()->json($position, 201);
    }
    
    public function show(Position $position)
    {
        return response()->json($position);
    }
    
    public function update(Request $request, Position $position)
    {
        $position->update($request->all());
    
        return response()->json($position);
    }
    
    public function destroy(Position $position)
    {
        $position->delete();
    
        return response()->json(null, 204);
    }
}
