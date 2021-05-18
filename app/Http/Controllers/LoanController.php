<?php

namespace App\Http\Controllers;

use App\Models\loan;
use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\book;

class LoanController extends Controller
{
    public function create(book $book) {
        $user = auth()->user();

        $stock = stock::where([
            'book_id' => $book->id
        ])->get();

        foreach ($stock as $s) {
            if ($s->loan == null) {
                $stock = $s;
            }
        }

        $loan = loan::create([
            'user_id' => $user->id,
            'stock_id' => $stock->id,
        ]);

        return back();

    }

    public function reloan(book $book) {
        $user = auth()->user();

        $loans = $user->loans;

        foreach ($loans as $loan) {
            if ($loan->book->id == $book->id){
                $loan->created_at = now();
                $loan->save();
            }
        }

        return back();
    }

    public function reserve(book $book) {

    }

    public function delete(Request $request) {
        $stock = stock::find($request->input('id'));
        $loan = $stock->loan;
        $errors = [];

        if (isset($loan) !== false) {
            $loan->delete();
        } else {
            array_push($errors, 'No loan for that book');
        }

        return back()->withErrors($errors);
    }
}
