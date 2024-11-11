<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mettre à jour le rôle d'un utilisateur
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Rôle mis à jour avec succès !');
    }
    public function destroy(User $user)
    {
  
    
        foreach ($user->borrows as $borrow) {
            $borrow->return_date = now(); 
            $borrow->save();
    
            $borrow->book->markAsAvailable(); 
        }
    
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé et ses livres sont maintenant disponibles.');
    }
}
