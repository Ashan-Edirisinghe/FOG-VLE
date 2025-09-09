<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Show the application form
     */
    public function showApplicationForm()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access the application form.');
        }

        // Check if user already has a candidate profile
        $candidate = Auth::user()->candidate;
        
        return view('application-form', compact('candidate'));
    }

    /**
     * Handle application form submission
     */
    public function submitApplication(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to submit the application.');
        }

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'nic' => 'required|string|max:20|unique:candidates,nic,' . (Auth::user()->candidate ? Auth::user()->candidate->id : 'NULL'),
            'email' => 'required|email|max:255|unique:candidates,email,' . (Auth::user()->candidate ? Auth::user()->candidate->id : 'NULL'),
            'telephone' => 'required|string|max:20',
            'undergraduate_degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'year' => 'required|integer|min:1950|max:2025',
            'field' => 'required|string|max:255',
            'gpa_class' => 'required|string|max:50',
            'intended_degree' => 'required|string|max:255',
            'discipline_area' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = Auth::user();

            // Create or update candidate profile
            $candidate = $user->candidate ?: new Candidate();
            $candidate->fill([
                'user_id' => $user->id,
                'full_name' => $request->full_name,
                'nic' => $request->nic,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'undergraduate_degree' => $request->undergraduate_degree,
                'university' => $request->university,
                'year' => $request->year,
                'field' => $request->field,
                'gpa_class' => $request->gpa_class,
            ]);
            $candidate->save();

            // Create application
            $application = new Application([
                'candidate_id' => $candidate->id,
                'intended_degree' => $request->intended_degree,
                'discipline_area' => $request->discipline_area,
                'status' => 'pending',
            ]);
            $application->save();

            return redirect()->route('application.success')->with('success', 'Application submitted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Application submission failed. Please try again.')
                ->withInput();
        }
    }

    /**
     * Show application success page
     */
    public function applicationSuccess()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('application-success');
    }

    /**
     * Show user's applications
     */
    public function myApplications()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $candidate = Auth::user()->candidate;
        $applications = $candidate ? $candidate->applications()->latest()->get() : collect();

        return view('my-applications', compact('applications'));
    }
}
