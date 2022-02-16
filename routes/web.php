<?php

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
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;




Route::get('/', function () {
    return view('layouts.application.index');
})->name('index')->middleware('auth');
Route::post('loans', [LoansController::class, 'store'])->name('loans.store')->middleware('auth');
Route::get('loans', [LoansController::class, 'index'])->name('loans.index')->middleware('auth');
Route::get('/allloans', [LoansController::class, 'allLoans'])->name('loans.allLoans');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/post', [LogoutController::class, 'store'])->name('logout');




Route::resource('customers', CustomersController::class);