<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow(Book $book)
    {
        if ($book->available) {
            $borrow = Borrow::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'borrow_date' => now(),
            ]);

            $book->update(['available' => false]);

            return redirect()->route('books.index')->with('success', 'Livre emprunté avec succès !');
        }

        return redirect()->route('books.index')->with('error', 'Ce livre n\'est pas disponible.');
    }

    public function returnBook(Borrow $borrow)
    {
        $borrow->update([
            'return_date' => now(),
        ]);

        $borrow->book->update(['available' => true]);

        return redirect()->route('books.index')->with('success', 'Livre retourné avec succès !');
    }
}
