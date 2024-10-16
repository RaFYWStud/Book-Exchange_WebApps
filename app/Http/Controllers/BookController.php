<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

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
            'description' => 'required|string|max:1000',
            'whatsapp' => 'required|string|max:15',
        ]);

        $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');

        Book::create([
            'cover_image' => '/storage/' . $coverImagePath,
            'title' => $request->title,
            'description' => $request->description,
            'whatsapp' => $request->whatsapp,
        ]);

        return redirect()->route('home');
    }
}
