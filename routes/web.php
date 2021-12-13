<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AuthController;

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


Route::resource('customer', 'App\Http\Controllers\CustomersController');
Route::resource('product', 'App\Http\Controllers\ProductsController');
Route::resource('order', 'App\Http\Controllers\OrdersController');
Route::resource('manageOrder', 'App\Http\Controllers\ManageOrderController');
Route::resource('pointOfSale', 'App\Http\Controllers\PointOfSaleController');
Route::resource('delivery', 'App\Http\Controllers\DeliverController');


// Route::get('order', [OrdersController::class, 'index']);
// Route::post('order', [OrdersController::class, 'store']);
//Route::post('order', 'App\Http\Controllers\OrdersController@store');


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'customSignup'])->name('user.registration');


//Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');