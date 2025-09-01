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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/application-form', function () {
    return view('application-form');
})->name('application.form');

Route::get('/interview-status', function () {
    return view('interview-status');
})->name('interview.status');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/supervisors', function () {
    return view('timeline.supervisors');
})->name('supervisors');

Route::get('/semester1', function () {
    return view('timeline.semester1');
})->name('semester1');

Route::get('/semester2', function () {
    return view('timeline.semester2');
})->name('semester2');

Route::get('/viva', function () {
    return view('timeline.viva');
})->name('viva');

Route::get('/thesis', function () {
    return view('timeline.thesis');
})->name('thesis');

Route::get('/pending', function () {
    return view('timeline.pending');
})->name('pending');

Route::get('/complete', function () {
    return view('timeline.complete');
})->name('complete');




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
