<?php


use App\Http\Controllers\admincontroller;
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
// Route::post('upload', [UploadController::class, 'upload']);

Route::post('car', [CarController::class, 'create']);
Route::get('car', [CarController::class, 'index']);


Route::post('house', [HouseController::class, 'create']);
Route::get('house', [HouseController::class, 'index']);

Route::post('labour', [LabourController::class, 'create']);
Route::get('labour', [LabourController::class, 'index']);

Route::post('other', [OthersController::class, 'create']);
Route::get('other', [OthersController::class, 'index']);



// Route::resource('car', CarController::class);
// Route::resource('house', HouseController::class);
// Route::resource('labour', LabourController::class);
// Route::resource('other', OthersController::class);


Route::resource('users', admincontroller::class);


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});