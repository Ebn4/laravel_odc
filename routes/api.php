<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get("/user",function(Request $request){
    return $request->user();
})->middleware("auth:sanctum");


// Route::group(function(){
//     Route::apiResource("articles",ArticleController::class);
//     Route::apiResource("articles",ArticleController::class);
// })->middleware();

Route::post('/article',[ArticleController::class,'store']);

Route::get('/article/{id}',[ArticleController::class,'show'])->where('n','[0-9]+');



