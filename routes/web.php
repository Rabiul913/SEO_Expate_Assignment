<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

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

// Route::get('/', function () {
//     return view('registration');
// });
Route::get('home', [UserController::class, 'index'])->name('home');
Route::get('registration', [UserController::class, 'registration'])->name('register');
Route::post('register/create', [UserController::class, 'createRegistration'])->name('register.create');
Route::get('login-form', [UserController::class, 'login'])->name('login.form');
Route::post('login', [UserController::class, 'authentication'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
