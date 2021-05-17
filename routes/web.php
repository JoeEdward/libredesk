<?php

use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\StockController;
use \App\Http\Controllers\TagController;
use \App\Http\Controllers\MotdController;


// Open Routes
Route::get('/', function () {
    return view('welcome');
})->name('start');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'create'])->name('LoginPost');



Route::middleware('auth')->group(function() {

    //User
    Route::get('/logout', [LoginController::class, 'destroy']);
    Route::get('/home', function () {
        $books = App\Models\book::all();
        $motd = DB::table('motds')->latest()->first();
        return view('users.homepage')->with(['books' => $books, 'motd' => $motd]);
    })->name('home');
    Route::get('/loans', [UserController::class, 'show']);

    // TODO: Profile
    Route::get('/profile', [UserController::class, 'me']);

    // TODO: User Loans

    // User Guides
    Route::get('/guides', [GuideController::class, 'userIndex']);

    // Books (User)
    Route::get('/user/book/{book}', [BookController::class, 'userSelect']);
    Route::get('/user/loan/{book}', [\App\Http\Controllers\LoanController::class, 'create']);
    Route::get('/user/reserve{book}', [\App\Http\Controllers\LoanController::class, 'reserve']);
    Route::get('/user/reloan/{book}', [\App\Http\Controllers\LoanController::class, 'reloan']);
    Route::get('/search/', [BookController::class, 'search']);

    // Tag
    Route::get('/tags/{tag}', [TagController::class, 'list']);
    Route::get('/tags', [TagController::class, 'userIndex']);
});


Route::middleware(['role', 'auth'])->group(function() {

    //Books (Admin)
    Route::get('/books/', [BookController::class, 'index']);
    Route::get('/books/add', function (){
        return view('books.create');
    });

    Route::post('/books/add', [BookController::class, 'create']);
    Route::post('/books/add/isbn', [BookController::class, 'quickCreate']);
    Route::get('/books/update/{id}', [BookController::class, 'updateBook']);
    Route::post('/books/update/{id}', [BookController::class, 'update']);
    Route::get('/books/tag/remove/{book}/{tag}', [BookController::class, 'deleteTag']);

    //Authors (Admin)
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, "updateAuthor"]);
    Route::post('/authors/{id}', [AuthorController::class, 'update']);

    // Stock
    Route::get('/stock/add/{id}', [StockController::class, 'createView']);
    Route::post('/stock/add/{id}', [StockController::class, 'create']);
    Route::get('/stock/', [StockController::class, 'index']);
    Route::get('/stock/delete/{id}', [stockController::class, 'delete']);

    // Users (Admin)
    Route::get('admin/home', [AdminController::class, 'index']);
    Route::get('/admin/users/index', [AdminController::class, 'userIndex']);
    Route::get('/admin/user/{id}', [UserController::class, 'userSelect']);
    Route::post('/admin/user/{id}/', [UserController::class, 'userUpdate']);
    Route::get('/admin/users/add', [UserController::class, 'userCreate']);
    Route::post('/admin/users/add', [UserController::class, 'create']);

    // Tags (Admin)
    Route::get('/admin/tags/', [TagController::class, 'adminIndex']);
    Route::post('/admin/tags/new', [TagController::class, 'add']);
    Route::get('/admin/tag/{tag}', [TagController::class, 'select']);
    Route::post('/admin/tags/update/{tag}', [TagController::class, 'update']);
    Route::get('/admin/tags/delete/{tag}', [TagController::class, 'delete']);

    // TODO: Guides (Admin)
    Route::get('/admin/guides', [GuideController::class, 'index']);
    Route::get('/admin/guides/{guide}', [GuideController::class, 'select']);
    Route::post('/admin/guides', [GuideController::class, 'create']);
    Route::get('/admin/guides/{guide}/delete', [GuideController::class, 'delete']);

    // TODO: Reports

    // MOTD
    Route::get('/admin/motd', [MotdController::class, 'index']);
    Route::post('/admin/motd', [MotdController::class, 'create']);
    Route::get('/admin/motd/remove/{motd}', [MotdController::class, 'delete']);
});





