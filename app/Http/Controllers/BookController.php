<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'whatsapp' => 'required|string|max:15',
        ]);

        // Simpan gambar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Simpan data buku
        // Contoh: Book::create([...]);

        return redirect()->route('offerbook')->with('success', 'Buku berhasil ditambahkan.');
    }
}