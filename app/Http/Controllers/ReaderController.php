<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return response()->json($readers);
    }

    public function create()
    {
        // Render form creation view if needed.
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:readers,phone',
        ]);

        $reader = Reader::create($validated);

        return response()->json(['message' => 'Reader created successfully', 'reader' => $reader], 201);
    }

    public function show($id)
    {
        $reader = Reader::findOrFail($id);
        return response()->json($reader);
    }

    public function edit($id)
    {
        // Render edit form view if needed.
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'birthday' => 'sometimes|date',
            'address' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:15|unique:readers,phone,' . $id,
        ]);

        $reader = Reader::findOrFail($id);
        $reader->update($validated);

        return response()->json(['message' => 'Reader updated successfully', 'reader' => $reader]);
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return response()->json(['message' => 'Reader deleted successfully']);
    }
}
