<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\StockController;
use \App\Http\Controllers\TagController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'create'])->name('LoginPost');



Route::middleware('auth')->group(function() {
    Route::get('/logout', [LoginController::class, 'destroy']);
    Route::get('/home', function () {
        $books = App\Models\book::all();
        return view('users.homepage')->with(['books' => $books]);
    })->name('home');
    Route::get('/user/book/{book}', [BookController::class, 'userSelect']);
    Route::get('/user/loan/{book}', [\App\Http\Controllers\LoanController::class, 'create']);
    Route::get('/user/reserve{book}', [\App\Http\Controllers\LoanController::class, 'reserve']);
    Route::get('/user/reloan/{book}', [\App\Http\Controllers\LoanController::class, 'reloan']);
    Route::get('/search/', [BookController::class, 'search']);
});


Route::middleware(['role', 'auth'])->group(function() {
    Route::get('/books/', [BookController::class, 'index']);
    Route::get('/books/add', function (){
        return view('books.create');
    });

    Route::post('/books/add', [BookController::class, 'create']);
    Route::post('/books/add/isbn', [BookController::class, 'quickCreate']);
    Route::get('/books/update/{id}', [BookController::class, 'updateBook']);
    Route::post('/books/update/{id}', [BookController::class, 'update']);

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, "updateAuthor"]);
    Route::post('/authors/{id}', [AuthorController::class, 'update']);

    Route::get('/stock/add/{id}', [StockController::class, 'createView']);
    Route::post('/stock/add/{id}', [StockController::class, 'create']);
    Route::get('/stock/', [StockController::class, 'index']);
    Route::get('/stock/delete/{id}', [stockController::class, 'delete']);

    Route::get('admin/home', [AdminController::class, 'index']);
    Route::get('/admin/users/index', [AdminController::class, 'userIndex']);
    Route::get('/admin/user/{id}', [UserController::class, 'userSelect']);
    Route::post('/admin/user/{id}/', [UserController::class, 'userUpdate']);
    Route::get('/admin/users/add', [UserController::class, 'userCreate']);
    Route::post('/admin/users/add', [UserController::class, 'create']);

    Route::get('/admin/tags/', [TagController::class, 'adminIndex']);
    Route::post('/admin/tags/new', [TagController::class, 'add']);
    Route::get('/admin/tag/{tag}', [TagController::class, 'select']);
    Route::post('/admin/tags/update/{tag}', [TagController::class, 'update']);
    Route::get('/admin/tags/delete/{tag}', [TagController::class, 'delete']);
});





