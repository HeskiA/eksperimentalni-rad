<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    //
    public function show($slug)
    {   
        return [
            'post' => Test::where('_id', $slug)->first()
        ];
    }

    public function store(Request $request)
    {
        $test = new Test;
 
        $test->naziv = $request->naziv;
        $test->slug = $request->slug;
 
        $test->save();
 
        return response()->json(["result" => "ok"], 201);
    }
}
