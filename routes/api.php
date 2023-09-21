<?php


use App\Http\Controllers\admincontroller;
use App\Http\Controllers\OthersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\LabourController;
use App\Http\Controllers\OthersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/users' , [admincontroller::class,'index']);
// Route::get('/users/:id', [admincontroller::class,'show']);
Route::resource('users',admincontroller::class);


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});