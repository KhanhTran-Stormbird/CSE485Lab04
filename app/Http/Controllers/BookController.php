<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function create()
    {
        // Render form creation view if needed.
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $book = Book::create($validated);

        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function edit($id)
    {
        // Render edit form view if needed.
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:0',
            'quantity' => 'sometimes|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
