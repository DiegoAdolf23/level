<?php

use App\Http\Controllers\PagesController;
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
Route::get("/", [PagesController::class, 'fnIndex']) -> name('xInicio');   
Route::get("/galería/{numero?}", [PagesController::class, 'fnGaleria']) -> where('numero','[0-9]+') -> name('xGaleria');
Route::get("/lista", [PagesController::class, 'fnLista']) -> name('xLista');

Route:: middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified
']) ->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    }) -> name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
}) -> name('xInicio');

Route::get('/saludo', function () {   
    return view('Hola Mundo desde Laravel');
});

Route::get('/galeria/{numero}', function ($numero){
    return "Este es el codigo de la foto: ".$numero;
}) -> where('numero','[0-9]+');

Route::view('/galeria','pagGaleria',['valor'=> 15]) -> name('xGaleria');

Route::get('/lista', function () {
    return view('pagLista');
}) -> name('xLista');