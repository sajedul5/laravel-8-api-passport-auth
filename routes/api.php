<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestAPIController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('testApi', [TestAPIController::class, 'testApi']);
Route::get('/blog-view', [BlogController::class, 'index']);
Route::get('/blog-view/{id}', [BlogController::class, 'findData']);
Route::post('/blog-add', [BlogController::class, 'addData']);
//Route::put('/blog-update', [BlogController::class, 'updateData']);
Route::put('/blog-update/{id}', [BlogController::class, 'updateData']);
Route::delete('/blog-delete/{id}', [BlogController::class, 'deleteData']);
Route::get('/search/{paran}', [BlogController::class, 'search']);

Route::post('/valid-data', [BlogController::class, 'validatorData']);

Route::post('/file-upload', [FileUploadController::class, 'Fileupload']);




// Route::group(['middleware' => 'auth:sanctum'], function (){
//     Route::apiResource('post', PostController::class);
// });
//Route::apiResource('post', PostController::class);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'login']);

Route::middleware('auth:api')->apiResource('post', PostController::class);
Route::middleware('auth:api')->get('userData', [UserController::class, 'userData']);