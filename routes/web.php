<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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

Route::get('/pic', [\App\Http\Controllers\TestController::class, 'index'])->name('pic.index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/android_login', [\App\Http\Controllers\Android\AuthController::class, 'showLoginForm'])->name('android.login');
//Route::post('/android_login', [\App\Http\Controllers\Android\LoginController::class, 'login'])->name('android.login.store');
