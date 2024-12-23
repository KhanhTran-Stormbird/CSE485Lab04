<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return view('library.readers.index', compact('readers'));
    }

    public function create()
    {
        return view('library.readers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:readers,phone',
        ]);

        Reader::create($validated);

        return redirect()->route('readers.index')->with('success', 'Reader added successfully.');
    }

    public function show($id)
    {
        $reader = Reader::findOrFail($id);
        return view('library.readers.show', compact('reader'));
    }

    public function edit($id)
    {
        $reader = Reader::findOrFail($id);
        return view('library.readers.edit', compact('reader'));
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

        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
