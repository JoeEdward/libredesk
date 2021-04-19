<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book as Book;

class BookController extends Controller
{
    public function index()
    {
    	$books = Book::All();

    	return view('books.index', ['books' => $books]);
    }
}
