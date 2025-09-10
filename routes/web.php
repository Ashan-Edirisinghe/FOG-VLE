
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\adminLogin;

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


// Authentication Routes
Route::get('/', [AuthController::class, 'showSignupForm'])->name('signup');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Application Routes
Route::middleware('auth')->group(function () {
    Route::get('/application-form', [ApplicationController::class, 'showApplicationForm'])->name('application.form');
    Route::post('/application-submit', [ApplicationController::class, 'submitApplication'])->name('application.submit');
    Route::get('/application-success', [ApplicationController::class, 'applicationSuccess'])->name('application.success');
    Route::get('/my-applications', [ApplicationController::class, 'myApplications'])->name('my.applications');
    
    // Dashboard (protected route)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profile route
    Route::get('/profile', function () {
        $user = auth()->user();
        $candidate = $user->candidate()->with('applications')->first();
        return view('profile', compact('user', 'candidate'));
    })->name('profile');

});

// Other existing routes
Route::get('/interview-status', function () {
    return view('interview-status');
})->name('interview.status');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

// Admin Routes
Route::get('/admin/admin-login', function () {
    return view('admin.admin-login');
})->name('admin.login');

 
Route::post('/admin/admin-login', [adminLogin::class, 'adminLogin']);

Route::get('/admin/admin-dashboard', function () {
    return view('admin.admin-dashboard');
})->name('admin.dashboard');
