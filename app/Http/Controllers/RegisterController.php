<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('notes.register-user');
    }
    public function register(Request $request)
    {
        try {
            // Validate the form data
            $request->validate([
                'first_name' => 'required|string|max:255',
                'family_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:utilisateurs',
                'password' => 'required|string|min:8|confirmed',
                // Add more validation rules for additional fields if necessary
            ]);
    
            // Create a new user with the validated data
            $user = User::create($request->only([
                'first_name',
                'family_name',
                'email',
                'password',
                'university',
                'study_field',
                'study_level',
                'coordinates',
                'phone',
                'pays',
                'city',
            ]));
            // Debug the session data
            dd(session()->all());
    
            // Redirect the user after registration
            return redirect()->route('notes.display-user', ['id' => $user->id])->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }
}
