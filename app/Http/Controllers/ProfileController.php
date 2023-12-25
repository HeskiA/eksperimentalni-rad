<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //

    public function show($slug)
    {   
        return [
            'profile' => Profile::where('_id', $slug)->first()
        ];
    }

    public function store(Request $request)
    {
        $profile = new Profile;
 
        $profile->user_id = $request->user_id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->summary = $request->summary;
        $profile->region_id = $request->region_id;
        $profile->industry_id = $request->industry_id;
        $profile->positions = $request->positions;
        $profile->education = $request->education;
        $profile->contact_info = $request->contact_info;



 
        $profile->save();
 
        return response()->json(["result" => "ok"], 201);
    }

    public function update(Request $request, $profileId)
    {
        $profile = Profile::find($profileId);
        
        if($request->user_id){$profile->user_id = $request->user_id;}
        if($request->first_name){$profile->first_name = $request->first_name;}
        if($request->last_name){$profile->last_name = $request->last_name;}
        if($request->summary){$profile->summary = $request->summary;}
        if($request->region_id){$profile->region_id = $request->region_id;}
        if($request->industry_id){$profile->industry_id = $request->industry_id;}
        if($request->positions){$profile->positions = $request->positions;}
        if($request->education){$profile->education = $request->education;}
        if($request->contact_info){$profile->contact_info = $request->contact_info;}


        $profile->save();
 
        return response()->json(["result" => "ok"], 201);
    }
}
