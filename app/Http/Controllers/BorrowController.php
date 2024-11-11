<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function borrow(Book $book)
    {
        if ($book->available) {
            $borrow = Borrow::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'borrow_date' => now(),
                'return_date' => now()->addDays(7),
              

            ]);

            $book->update(['available' => false]);

            return redirect()->route('books.index')->with('success', 'Livre emprunté avec succès !');
        }

        return redirect()->route('books.index')->with('error', 'Ce livre n\'est pas disponible.');
    }

    public function returnBook(Borrow $borrow)
    {
        $borrow->return_date = now();
        
        $borrow->book->update(['available' => true]);
        
        $borrow->save();
        
        return redirect()->route('profile.borrowed-books')->with('success', 'Livre rendu avec succès !');
    }
    
    
    
    
    

    public function index()
    {
        $user = Auth::user();
     
    
        $borrows = Borrow::where('user_id', $user->id)
        ->where('borrow_date', '<=', Carbon::now())
        ->where('return_date', '>=', Carbon::now())
        ->with('book')
        ->get();

        foreach ($borrows as $borrow) {
            $borrow->borrow_date = Carbon::parse($borrow->borrow_date);
            $borrow->return_date = Carbon::parse($borrow->return_date);
        }    
        return view('profile.borrowed-books', compact('borrows'));
    }
    

}
