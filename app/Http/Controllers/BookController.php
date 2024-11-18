<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->get();
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

    public function storeOffer(Request $request, Book $book)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
        ]);

        $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');

        Offer::create([
            'cover_image' => '/storage/' . $coverImagePath,
            'title' => $request->title,
            'author' => $request->author,
            'condition' => $request->condition,
            'whatsapp' => $request->whatsapp,
            'book_id' => $book->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home');
    }

    public function viewOffers(Book $book)
    {
        $offers = Offer::where('book_id', $book->id)->get();
        return view('othersoffer', compact('book', 'offers'));
    }

    public function viewAllOffers()
    {
        $userId = Auth::id();
        $books = Book::where('user_id', $userId)->with('offers.user')->get();
        return view('othersoffer', compact('books'));
    }

    public function acceptOffer(Book $book, Offer $offer)
    {
        $offer->update(['status' => 'accepted']);
        return redirect()->route('alloffers');
    }

    public function completeTransaction(Book $book, Offer $offer)
    {
        $book->delete();
        return redirect()->route('home');
    }

    public function yourOffer()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('youroffer', compact('books'));
    }

    public function edit(Book $book)
    {
        return view('editbook', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'condition' => $request->condition,
        ]);

        return redirect()->route('youroffer')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('youroffer')->with('success', 'Book deleted successfully.');
    }
}
