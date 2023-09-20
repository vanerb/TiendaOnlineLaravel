<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CestaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('app');
});

Route::resource('cesta', CestaController::class);
Route::get('/products/showall', [ProductController::class, 'showall'])->name('products.showall');
Route::post('/products/addcesta/{product}', [ProductController::class, 'addcesta'])->name('products.addcesta');
Route::view('/register', 'auth.register')->name('register');


Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'destroy'])->name('logout');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::resource('products', ProductController::class);

