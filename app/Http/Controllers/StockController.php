<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function createView($id) {
        $book = book::find($id);
        $stocks = book::find($id)->stock;

        return view('users.admin.stock.create')->with(['stocks' => $stocks, 'book' => $book]);
    }

    public function create($id, Request $request) {
        $book = Book::find($id);

        for ($i = 0; $i < $request->count; $i++) {
            $stock = new stock(['book_id' => $book->id]);
            $book->addStock($stock);
        }

        return back();
    }

    public function index() {
        $stocks = stock::all();
        $stocksAvailable = [];
        $stocksOut = [];

        foreach ($stocks as $stock) {
            if ($stock->loan !== null) {
                array_push($stocksOut, $stock);
            } else {
                array_push($stocksAvailable, $stock);
            }
        }

        return view('users.admin.stock.index')->with(['available' => $stocksAvailable, 'out' => $stocksOut]);
    }

    public function delete($id) {
        $stock = Stock::find($id);

        $stock->delete();

        return back();
    }

}
