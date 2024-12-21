<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book', 'reader')->get();
        return view('library.borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('library.borrows.create', compact('books', 'readers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => 'required|boolean',
        ]);

        Borrow::create($validated);

        return redirect()->route('borrows.index')->with('success', 'Borrow record created successfully.');
    }

    public function show($id)
    {
        $borrow = Borrow::with('book', 'reader')->findOrFail($id);
        return view('library.borrows.show', compact('borrow'));
    }

    public function edit($id)
    {
        $borrow = Borrow::findOrFail($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('library.borrows.edit', compact('borrow', 'books', 'readers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reader_id' => 'sometimes|exists:readers,id',
            'book_id' => 'sometimes|exists:books,id',
            'borrow_date' => 'sometimes|date',
            'return_date' => 'nullable|date|after:borrow_date',
            'status' => 'sometimes|boolean',
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->update($validated);

        return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully.');
    }
}
