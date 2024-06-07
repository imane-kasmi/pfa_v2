<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/profile/{id}'; // Redirection après la connexion

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        // Redirigez l'utilisateur vers la route display-user avec son ID
        return redirect()->route('notes.display-user', ['id' => $user->id])->with('success', 'Login successful.');
    }
    public function showLoginForm()
    {
        return view('notes.login'); // Utilisez le chemin correct pour la vue de connexion
    }
   
}
