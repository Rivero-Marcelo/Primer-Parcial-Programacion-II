<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('usuario/alta', [UserController::class, 'create'])->name('usuario.create');
Route::post('usuario/alta', [UserController::class, 'store'])->name('usuario.store');

Route::get('/login', [LogController::class, 'index'])->name('login');
Route::post('/login', [LogController::class, 'autenticar'])->name('autenticar');

Route::get('/logout', [LogController::class, 'logout'])->name('logout');




Route::middleware([Autenticar::class])->group(function(){

    Route::get('home', function(){
        return view('home');
    } )->name('home');

    Route::get('producto/alta', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('producto/alta', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('producto/listado', [ProductoController::class, 'showAll'])->name('producto.showAll');
    Route::get('producto/eliminar/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

});


