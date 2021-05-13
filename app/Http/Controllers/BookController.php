<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book as Book;
use App\Models\Author;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
    	$books = Book::All();

    	return view('books.index', ['books' => $books]);
    }

    /**
     * Creates a new book from the data in the request body
     * @param Request $request
     * @author Joe
     */
    public function create(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'blurb' => 'required',
            'img' => 'required'
        ]);

        $authorName = explode(',', $request->author);

        $author = Author::firstOrCreate([
            'first_name' => $authorName[1],
            'last_name'=> $authorName[0]
        ]);

        $book = Book::firstOrCreate([
            'title' => $request->title,
        ],[
            'author' => $author->id,
            'blurb' => $request->blurb,
            'img' => $request->img
        ]);

        return redirect('/books/add')->withErrors(['Book added successfully']);
    }

    /**
     * Calls the openlibrary API to get information about a book with the ISBN
     * given in the request body
     * @param Request $request
     * @author Joe
     */
    public function quickCreate(Request $request) {

        $apiURL = 'https://openlibrary.org/isbn/' . $request->ISBN . '.json';
        try {
            $apiResponse = file_get_contents($apiURL);
        } catch(\Exception $exception) {
            return redirect('books/add')->withErrors(['ISBN Lookup Failed' . $exception]);
        }
        $data = json_decode($apiResponse, true);
        $authorURL = 'https://openlibrary.org' . $data['authors'][0]['key'] . '.json';
        $authorResponse = file_get_contents($authorURL);
        $authorData = json_decode($authorResponse, true);

        if (isset($authorData['name'])) {
            $name = explode(' ', $authorData['name']);
        }elseif(isset($authorData['personal_name'])) {
            $name = explode(',', $authorData['personal_name']);
        }

        if (isset($authorData['bio'])) {
            $authorBio = $authorData['bio']['value'];
        } else {
            $authorBio = "Oops, No bio found for this author";
        }

        $author = Author::firstOrCreate([
            'last_name' => $name[0],
            'first_name' => $name[1],
        ],[
            'bio' => $authorBio
        ]);

        $book = new Book();

        $book->title = $data['title'];
        $book->author = $author->id;

        if(isset($data['description'])){
            $book->blurb = $data['description'];
        } elseif(isset($data['first_sentence']['value'])) {
            $book->blurb = $data['first_sentence']['value'];
        }else {
            $book->blurb = "Oops, theres no description for this book";
        }

        $book->isbn = $request->ISBN;
        $book->img = 'https://covers.openlibrary.org/b/id/' . $data['covers'][0] . '.jpg';
        $book->save();

        return redirect('/books/add')->withErrors(['Book Added Successfully']);

    }

    public function updateBook($id) {
        $book = Book::find($id);

        return view('books.update')->with(['book' => $book]);
    }

    public function update($id, Request $request) {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->blurb = $request->blurb;
        $book->img = $request->img;

        $book->save();

        return back()->withErrors(['Book Updated Successfully']);
    }

    public function userSelect(Book $book) {
        return view('users.books.select')->with(["book" => $book]);
    }

    public function search(Request $request) {
        $searchTerm = $request->input('search');

        $books = Book::query()
            ->where('title', 'LIKE', "%{$searchTerm}")
            ->orWhere('blurb', 'LIKE', "%{$searchTerm}")
            ->get();

        return view('books.bookSearch')->with(['books' => $books]);
    }
}
