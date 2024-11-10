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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'nullable',
        ]);
    
        $data = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'year' => $request->input('year'),
            'available' => $request->has('available') ? 1 : 0,
        ];
    
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $data['cover_image'] = $path;
        }
    
        Book::create($data);
    
        return redirect()->route('books.create')->with('success', 'Livre ajouté avec succès !');
    }
    
    public function index()
    {
        $books = Book::all();
    
        if ($books->isEmpty()) {
            session()->flash('error', 'Aucun livre n\'a été trouvé.');
        }
    
        return view('books.index', compact('books'));
    }
    public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès !');
}

    

}
