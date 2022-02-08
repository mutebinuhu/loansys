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


Route::get('/', function () {
    return view('layouts.application.index');
});
Route::post('loans', [LoansController::class, 'store'])->name('loans.store');
Route::get('loans', [LoansController::class, 'index'])->name('loans.index');

Route::resource('customers', CustomersController::class);