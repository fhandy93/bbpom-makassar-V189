<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [FrontController::class, 'front']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route :: get('/layanan-informasi',[LayananController::class,'info']);
Route :: get('/layanan-pengujian',[LayananController::class,'uji']);
Route :: get('/layanan-lainnya',[LayananController::class,'lainnya']);
Route :: get('/layanan-sertifikasi',[LayananController::class,'laySer']);
Route :: get('/kurang-puas',[SurveyController::class,'kurang']);
Route :: get('/cukup-puas',[SurveyController::class,'cukPuas']);
Route :: get('/puas',[SurveyController::class,'puas']);
Route :: get('/sangat-puas',[SurveyController::class,'sanPuas']);
Route :: get('/showpic/{id}',[SurveyController::class,'picture']);
Route :: post('/kirim-survey',[SurveyController::class,'store']);
Route :: post('/input-layanan',[LayananController::class,'store']);
Route :: get('/error',[LayananController::class,'error']);
