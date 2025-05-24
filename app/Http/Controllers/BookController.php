<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publication_year' => 'required|integer',
            'cover_page' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_page')) {
            $coverPath = $request->file('cover_page')->store('covers', 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'publication_year' => $request->publication_year,
            'cover_page' => $coverPath
        ]);

        return redirect()->route('books.index')->with('success', 'Book added!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publication_year' => 'required|integer',
            'cover_page' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('cover_page')) {
            $coverPath = $request->file('cover_page')->store('covers', 'public');
            $book->cover_page = $coverPath;
        }

        $book->update($request->only(['title', 'author', 'genre', 'publication_year']));

        return redirect()->route('books.index')->with('success', 'Book updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted!');
    }
}
?>