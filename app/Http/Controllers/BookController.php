<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:0|max:9999',
            'available' => 'nullable',
        ]);

        // Création du livre
        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'year' => $request->input('year'),
            'available' => $request->has('available') ? 1 : 0, 
        ]);

        return redirect()->route('books.create')->with('success', 'Livre ajouté avec succès !');
    }
}
