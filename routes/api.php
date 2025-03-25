<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpulController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);


    Route::resource('programs', App\Http\Controllers\API\ProgramController::class);
    
    
    Route::get('/sample/{id}', 'App\Http\Controllers\API\ProgramController@sample')->name('sample');
    Route::get('/detail/{id}/{idn}', 'App\Http\Controllers\API\ProgramController@detail')->name('detail');
    Route::post('/kuisioner', 'App\Http\Controllers\API\ProgramController@store')->name('store');
    Route::get('/load/{id}', 'App\Http\Controllers\API\ProgramController@loadData')->name('loadData');
    
});

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

// API Route Simpul
Route::get('/parameter-uji/{id}', [App\Http\Controllers\API\SimpulController::class, 'param']);
Route::get('/kategory/{id}', [App\Http\Controllers\API\SimpulController::class, 'kategori']);
Route::get('/sub-kategory/{id}', [App\Http\Controllers\API\SimpulController::class, 'subKat']);
Route::post('/kategory-pangan/search', [App\Http\Controllers\API\SimpulController::class, 'katPanganSearch']);
Route::middleware('throttle:60,1')->post('/search-sub', [App\Http\Controllers\API\SimpulController::class, 'searchSub']);
Route::get('/get-index', [App\Http\Controllers\API\SimpulController::class, 'index']);





