<?php

use App\Http\Controllers\ProductoController;
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
    return view('home');
});


Route::get('producto/alta', [ProductoController::class, 'create'])->name('producto.create');
Route::post('producto/alta', [ProductoController::class, 'store'])->name('producto.store');

Route::get('home', function(){
    return view('home');
} )->name('home');


