<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request,$id)
    {
        // Validate the incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            // 'email' => 'required|string|email|unique:users',
            'email' => 'required|string|email|unique:utilisateurs,email',
            'password' => 'required|string|min:8',
            // Add validation rules for other fields
        ]);

        // Create and save the new user
        $user = User::create([
            'first_name' => $request->first_name,
            'family_name' => $request->family_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'university' => $request->university,
            'study_field' => $request->study_field,
            'study_level' => $request->study_level,
            'coordinates' => $request->coordinates,
        ]);

        // Redirect the user after registration
        // return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        
        // return redirect()->route('display-user', ['id' => $user->id])->with('success', 'Registration successful. Please login.');
        // return redirect()->route('display-user', ['id' => $user->id])->with('success', 'Registration successful. Please login.');
        return redirect()->route('notes.register-user', ['id' => $user->id])->with('success', 'Registration successful. Please login.');
       // return view('notes.register-user', compact('user'))
          // ->with('success', 'Registration successful. Please login.');


    }
}
