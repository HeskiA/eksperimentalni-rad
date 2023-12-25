<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactInfo2;


class ContactInfo2Controller extends Controller
{
    //

    public function index()
    {
        return ContactInfo2::all();
    }
    
    public function store(Request $request)
    {
        $contactinfo = ContactInfo2::create($request->all());
    
        return response()->json($contactinfo, 201);
    }
    
    public function show(ContactInfo2 $contactinfo)
    {
        return response()->json($contactinfo);
    }
    
    public function update(Request $request, ContactInfo2 $contactinfo)
    {
        $contactinfo->update($request->all());
    
        return response()->json($contactinfo);
    }
    
    public function destroy(ContactInfo2 $contactinfo)
    {
        $contactinfo->delete();
    
        return response()->json(null, 204);
    }
}
