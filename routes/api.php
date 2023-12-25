<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\RegionResource;
use App\Models\Region;

use App\Http\Resources\IndustryResource;
use App\Models\Industry;

use App\Http\Resources\UserResource;
use App\Models\User;

use App\Http\Resources\PositionResource;
use App\Models\Position;

use App\Http\Resources\EducationResource;
use App\Models\Education;

use App\Http\Resources\ContactInfoResource;
use App\Models\ContactInfo;

use App\Http\Resources\ProfileResource;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/region/{id}', function (string $id) {
    return new RegionResource(Region::findOrFail($id));
});

Route::get('/industry/{id}', function (string $id) {
    return new IndustryResource(Industry::findOrFail($id));
});

Route::get('/position/{id}', function (string $id) {
    return new PositionResource(Position::findOrFail($id));
});

Route::get('/education/{id}', function (string $id) {
    return new EducationResource(Education::findOrFail($id));
});

Route::get('/contactinfo/{id}', function (string $id) {
    return new ContactInfoResource(ContactInfo::findOrFail($id));
});

Route::get('/profile/{id}', function (string $id) {
    return new ProfileResource(User::findOrFail($id));
});

Route::get('/test/{slug}', [TestController::class, 'show']);
Route::resource('tests', TestController::class)->only([
    'destroy', 'show', 'store', 'update'
 ]);

Route::get('/mongoprofile/{slug}', [ProfileController::class, 'show']);
Route::resource('mongoprofiles', ProfileController::class)->only([
     'destroy', 'show', 'store', 'update'
]);

Route::get('/ping', function (Request  $request) {    
    $connection = DB::connection('mongodb');
    $msg = 'MongoDB is accessible!';
    try {  
        $connection->command(['ping' => 1]);  
    } catch (\Exception  $e) {  
        $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
    }
    return ['msg' => $msg];
});

Route::get('/debiv', function (Request  $request) {    
    return ['msg' => "debiv"];
});