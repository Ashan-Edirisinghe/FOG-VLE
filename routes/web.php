
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\adminLogin;
use App\Http\Controllers\admin_dash_controller;
use App\Http\Controllers\FinalSubmissionController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\SubmitionController;

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
    
    // Student Profile (separate from profile)
    Route::get('/student/profile', function () {
        $user = auth()->user();
        $candidate = $user->candidate()->with('applications')->first();
        $latestApplication = $candidate ? $candidate->applications()->latest()->first() : null;
        return view('student-profile', compact('user', 'candidate', 'latestApplication'));
    })->name('student.profile');

    // Profile route
    Route::get('/profile', function () {
        $user = auth()->user();
        $candidate = $user->candidate()->with('applications')->first();
        return view('profile', compact('user', 'candidate'));
    })->name('profile');

    // Time Controller routes
    Route::get('/application/created-date', [TimeController::class, 'created_date'])->name('application.created_date');
    
    // Timeline route
    Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline');

});

// Final Submission Route
Route::middleware('auth')->group(function () {
    Route::get('/final-submission', function () {
        return view('final-submission');
    })->name('final.submission');
    
    // Add POST route for file submission
    Route::post('/final-submission', [\App\Http\Controllers\FinalSubmissionController::class, 'store'])->name('final.submission.store');
});

// Other existing routes
Route::get('/interview-status', function () {
    return view('interview-status');
})->name('interview.status');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

 



// Admin Routes
Route::get('/admin/admin-login', function () {
    return view('admin.admin-login');
})->name('admin.login');

 
Route::post('/admin/admin-login', [adminLogin::class, 'adminLogin']);

 

 Route::get('/admin/admin-dashboard', [\App\Http\Controllers\admin_dash_controller::class, 'showDashboard'])->name('admin.dashboard');

// Admin API Routes
Route::get('/admin/candidates/names', [\App\Http\Controllers\admin_dash_controller::class, 'getCandidatesNames'])->name('admin.candidates.names');
Route::get('/admin/candidates/applications', [\App\Http\Controllers\admin_dash_controller::class, 'getCandidatesFromApplications'])->name('admin.candidates.applications');
Route::get('/admin/candidate/{id}/view', [\App\Http\Controllers\admin_dash_controller::class, 'viewCandidate'])->name('admin.candidate.view');

// Admin Actions Routes
Route::post('/admin/candidate/{id}/approve', [\App\Http\Controllers\admin_dash_controller::class, 'approveCandidate'])->name('admin.candidate.approve');
Route::post('/admin/candidate/{id}/reject', [\App\Http\Controllers\admin_dash_controller::class, 'rejectCandidate'])->name('admin.candidate.reject');
Route::post('/admin/candidate/{id}/status', [\App\Http\Controllers\admin_dash_controller::class, 'updateStatus'])->name('admin.candidate.status');


Route::get('/evaluation', function () {
    return view('evaluation');
})->name('evaluation');

// Debug route to test data
Route::get('/debug-candidates', function() {
    try {
        $applications = \App\Models\Application::count();
        $candidates = \App\Models\Candidate::count();
        
        return response()->json([
            'applications_count' => $applications,
            'candidates_count' => $candidates,
            'applications_sample' => \App\Models\Application::limit(3)->get(),
            'candidates_sample' => \App\Models\Candidate::limit(3)->get()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ]);
    }
});



//submition routes
Route::post('/evaluation', [SubmitionController::class, 'submition'])->name('evaluation.store');
