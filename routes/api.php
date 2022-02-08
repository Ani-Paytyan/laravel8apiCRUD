<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ProductController;

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

//Route::post('/product', [ProductController::class, 'store']);



Route::post('/register', [App\Http\Controllers\api\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\api\AuthController::class, 'login']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::delete('/destroy/{id}', [App\Http\Controllers\API\ProductController::class, 'destroy']);

});

Route:: get ('/', function () {
    return 'Welcome to index';
});
