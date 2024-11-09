<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');

        Book::create([
            'cover_image' => '/storage/' . $coverImagePath,
            'title' => $request->title,
            'author' => $request->author,
            'condition' => $request->condition,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        $book->update($request->all());

        return redirect()->route('youroffer');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('youroffer');
    }

    public function yourOffer()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('youroffer', compact('books'));
    }
}
