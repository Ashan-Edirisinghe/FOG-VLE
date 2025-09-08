
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

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

Route::post('/register', function () {
    // For now, just redirect back with a success message
    return redirect('/')->with('success', 'Account created successfully!');
})->name('register');

Route::post('/login', function () {
    // For now, just redirect back with a success message
    return redirect('/login')->with('success', 'Login successful!');
})->name('login.post');

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

//Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/profile', function () {
    $user = (object)[
        'name' => 'Test User',
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'nic' => '123456789V',
        'telephone' => '0712345678',
        'undergraduate_degree' => 'BSc in Computer Science',
        'university' => 'Sabaragamuwa University',
        'year' => '2022',
        'field' => 'Computer Science',
        'gpa_class' => 'First Class',
        'intended_degree' => 'MSc in Data Science',
        'discipline_area' => 'Artificial Intelligence',
        'degree_start_date' => Carbon::now()->subMonths(2),
    ];
    return view('profile', compact('user'));
})->name('profile');

