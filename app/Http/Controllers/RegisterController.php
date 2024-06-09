<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('notes.register-user');
    }
    public function register(Request $request)
    {

        try {

              // Valider les données du formulaire
        $request->validate([
            'first_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'university' => 'nullable|string|max:255',
            'study_field' => 'nullable|string|max:255',
            'study_level' => 'nullable|string|max:255',
            //'coordinates' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            //'pays' => 'nullable|string|max:255',
            //'city' => 'nullable|string|max:255',
        ]);
        // Ajoutez cette ligne pour afficher les données du formulaire
        //dd($request->all());

        // Créer un nouvel utilisateur
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->family_name = $request->input('family_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->university = $request->input('university');
        $user->study_field = $request->input('study_field');
        $user->study_level = $request->input('study_level');
        //$user->coordinates = $request->input('coordinates');
        $user->phone = $request->input('phone');
        //$user->pays = $request->input('pays');
        //$user->city = $request->input('city');

        // Enregistrer l'utilisateur dans la base de données
        $user->save();

        // Rediriger l'utilisateur après l'inscription
        return redirect()->route('notes.login', ['id' => $user->id])->with('success', 'Registration successful. Please login.');
          
          } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route('notes.register')->with('error',"Registration Failed. $errorMessage");
          }


      
    }
    protected function registered(Request $request, $user)
    {
        // Here you can perform additional actions after the user has been registered, if needed
        Auth::logout();  // Déconnecter l'utilisateur après l'inscription
        return redirect('/login');  // Rediriger vers la page de connexion
    }
}
