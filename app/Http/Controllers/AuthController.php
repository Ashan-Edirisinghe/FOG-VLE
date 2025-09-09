<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the signup form
     */
    public function showSignupForm()
    {
        return view('signup');
    }

    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('signin');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stu_email' => 'required|email|unique:users,email',
            'stu_password' => 'required|min:6',
            'stu_password_cnf' => 'required|same:stu_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::create([
                'name' => explode('@', $request->stu_email)[0], // Use email prefix as temporary name
                'email' => $request->stu_email,
                'password' => Hash::make($request->stu_password),
                'is_active' => true, // Set to true for now, can be changed later for email verification
            ]);

            // Log the user in
            Auth::login($user);

            return redirect()->route('application.form')->with('success', 'Account created successfully! Please complete your application form.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Registration failed. Please try again.')
                ->withInput();
        }
    }

    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if user has completed their candidate profile
            if (!Auth::user()->candidate) {
                return redirect()->route('application.form')->with('info', 'Please complete your application form.');
            }

            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()
            ->with('error', 'Invalid email or password.')
            ->withInput($request->only('email'));
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
