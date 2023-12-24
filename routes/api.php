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