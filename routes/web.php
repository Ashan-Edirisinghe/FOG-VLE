<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('signin');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('signin');
})->name('login');

Route::get('/application-form', function () {
    return view('application-form');
})->name('application.form');

Route::get('/application', function () {
    return view('application');
})->name('application');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/interview-status', function () {
    return view('interview-status');
})->name('interview.status');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::post('/register', function () {
    // For now, just redirect back with a success message
    return redirect('/')->with('success', 'Account created successfully!');
})->name('register');

Route::post('/login', function () {
    // For now, just redirect back with a success message
    return redirect('/login')->with('success', 'Login successful!');
})->name('login.post');

Route::post('/application-form', function () {
    // For now, just redirect back with a success message
    return redirect('/application-form')->with('success', 'Application submitted successfully!');
})->name('application.submit');
