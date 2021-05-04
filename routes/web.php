<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('/books/', [BookController::class, 'index']);
Route::get('/books/add', function (){
    return view('books.create');
})->middleware('role');
Route::post('/books/add', [BookController::class, 'create'])->middleware('role');
Route::post('/books/add/isbn', [BookController::class, 'quickCreate'])->middleware('role');
Route::get('/books/update/{id}', [BookController::class, 'updateBook'])->middleware('role');
Route::post('/books/update/{id}', [BookController::class, 'update'])->middleware('role');

Route::get('admin/home', [AdminController::class, 'index'])->middleware('role');
Route::get('/admin/users/index', [AdminController::class, 'userIndex'])->middleware('role');
Route::get('/admin/user/{id}', [UserController::class, 'userSelect'])->middleware('role');
Route::post('/admin/user/{id}/', [UserController::class, 'userUpdate'])->middleware('role');
Route::get('/admin/users/add', [UserController::class, 'userCreate'])->middleware('role');
Route::post('/admin/users/add', [UserController::class, 'create'])->middleware('role');
