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
        return response()->json($borrows);
    }

    public function create()
    {
        // Render form creation view if needed.
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

        $borrow = Borrow::create($validated);

        return response()->json(['message' => 'Borrow record created successfully', 'borrow' => $borrow], 201);
    }

    public function show($id)
    {
        $borrow = Borrow::with('book', 'reader')->findOrFail($id);
        return response()->json($borrow);
    }

    public function edit($id)
    {
        // Render edit form view if needed.
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

        return response()->json(['message' => 'Borrow record updated successfully', 'borrow' => $borrow]);
    }

    public function destroy($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return response()->json(['message' => 'Borrow record deleted successfully']);
    }
}
