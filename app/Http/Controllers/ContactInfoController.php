<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    //
    public function index()
    {
        return ContactInfo::all();
    }
    
    public function store(Request $request)
    {
        $contactinfo = ContactInfo::create($request->all());
    
        return response()->json($contactinfo, 201);
    }
    
    public function show(ContactInfo $contactinfo)
    {
        return response()->json($contactinfo);
    }
    
    public function update(Request $request, ContactInfo $contactinfo)
    {
        $contactinfo->update($request->all());
    
        return response()->json($contactinfo);
    }
    
    public function destroy(ContactInfo $contactinfo)
    {
        $contactinfo->delete();
    
        return response()->json(null, 204);
    }
}
