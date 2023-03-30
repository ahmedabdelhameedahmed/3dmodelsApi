<?php

use App\Http\Controllers\Api\MymodelController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'auth'],function()
{
    Route::post('models',[MymodelController::class,'store']);
    Route::put('models/{id}/edit',[MymodelController::class,'update']);
    Route::delete('models/{id}/delete',[MymodelController::class,'destroy']);

});

Route::get('models',[MymodelController::class,'index']);
Route::get('models/{id}',[MymodelController::class,'show']);
Route::get('models/{id}/edit',[MymodelController::class,'edit']);
Route::post('user/register',[UserController::class,'register']);
Route::post('user/login',[UserController::class,'login']);

