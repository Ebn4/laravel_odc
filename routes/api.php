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
Route::get('/articles',[ArticleController::class,'index']);
Route::get('/article/{id}',[ArticleController::class,'show'])->where('id','[0-9]+');





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([], function(){

})->middleware('auth:sanctum');

Route::post('categories', [ArticleController::class, 'store']);
Route::post('categories', [CategoryController::class, 'store']);
Route::post('users', [UserController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);

Route::apiResource('articles', ArticleController::class);
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response() -> json(['message' => 'Email ou mot de passe incorrect.'], 401);
    }

    $token =  $user->createToken($request->email)->plainTextToken;
    $user -> token = $token;

    return $user;
});
