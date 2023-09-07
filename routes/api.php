<?php


use App\Http\Controllers\admincontroller;
use App\Http\Controllers\HouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\middleware\AdminAccessMiddleWare;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CarController;

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
Route::post('upload', [UploadController::class, 'upload']);

Route::post('car', [CarController::class, 'create']);
Route::get('car', [CarController::class, 'index']);
// Route::resource('car', CarController::class);

Route::resource('users', admincontroller::class);


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});