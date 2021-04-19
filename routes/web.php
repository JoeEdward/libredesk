<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;

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
})->name('start');


Route::get('/home', function () {
	return view('users.homepage');
})->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'create'])->name('LoginPost');
Route::get('/logout', [LoginController::class, 'destroy']);

Route::get('/books/testing', [BookController::class, 'index']);
Route::get('/books/add', function (){
    return view('books.create');
});

Route::get('admin/home', [AdminController::class, 'index']);
