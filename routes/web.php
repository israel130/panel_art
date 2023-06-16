<?php

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

Route::get('/', function () {return view('auth.login');});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function (){ return view('dashboard');})->name('dashboard');
    Route::get('/graphic/img', function (){ return view('config_img');})->name('graphic/img');
    Route::get('/graphic/carrusel', function (){ return view('config_carrusel');})->name('graphic/carrusel');
    Route::post('/imgguardarpub',[App\Http\Controllers\art::class ,'img_guardar']);
    Route::get('/datos_img_catalogo',[App\Http\Controllers\art::class ,'datos_img_catalogo']);
    Route::get('/eliminar_img_catalogo',[App\Http\Controllers\art::class ,'eliminar_img_catalogo']);
    Route::post('/img_carrusel',[App\Http\Controllers\art::class ,'img_carrusel']);
    Route::get('/cantidad_img_carrusel',[App\Http\Controllers\art::class ,'cantidad_img_carrusel']);
    Route::get('/datos_img_carrusel',[App\Http\Controllers\art::class ,'datos_img_carrusel']);
    Route::get('/eliminar_img_carrusel',[App\Http\Controllers\art::class ,'eliminar_img_carrusel']);
    
});


