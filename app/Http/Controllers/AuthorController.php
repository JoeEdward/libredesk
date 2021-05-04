<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();

        return view('author.index')->with(['authors' => $authors]);
    }

    public function updateAuthor($id) {
        $author = Author::find($id);

        return view('author.update')->with(['author' => $author]);
    }

    public function update($id, Request $request) {
        $author = Author::find($id);

        $author->first_name = $request->firstName;
        $author->last_name = $request->lastName;
        $author->bio = $request->bio;

        $author->save();

        return back()->withErrors(['Author Updated successfully']);

    }
}
