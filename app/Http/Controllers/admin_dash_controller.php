<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Application;
use App\Models\User;

class admin_dash_controller extends Controller
{
    /**
     * Show admin dashboard with candidates data
     */
    public function showDashboard()
    {
        try {
            // Get applications with their candidate details using relationship
            $applications = Application::with('candidate')->get();
            
            // Transform the data for the view
            $candidates = $applications->map(function($application) {
                $candidate = $application->candidate;
                return (object)[
                    'id' => $application->id,
                    'full_name' => $candidate->full_name ?? 'N/A',
                    'email' => $candidate->email ?? 'N/A',
                    'nic' => $candidate->nic ?? 'N/A',
                    'telephone' => $candidate->telephone ?? 'N/A',
                    'programe' => $application->intended_degree ?? 'N/A',
                    'undergraduate_degree' => $candidate->undergraduate_degree ?? 'N/A',
                    'university' => $candidate->university ?? 'N/A',
                    'year' => $candidate->year ?? 'N/A',
                    'field' => $candidate->field ?? 'N/A',
                    'gpa_class' => $candidate->gpa_class ?? 'N/A',
                    'created_at' => $application->created_at,
                    'status' => $application->status ?? 'pending'
                ];
            });
            
            return view('admin.admin-dashboard', compact('candidates'));
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Dashboard error: ' . $e->getMessage());
            
            $candidates = collect(); // Empty collection if error
            return view('admin.admin-dashboard', compact('candidates'))->with('error', 'Error loading candidates: ' . $e->getMessage());
        }
    }

    /**
     * Get all candidates names (API endpoint)
     */
    public function getCandidatesNames()
    {
        try {
            // Get candidates from Candidate model (if you're using the old structure)
            $candidates = Candidate::select('user_id', 'full_name')->get();
            
            return response()->json([
                'success' => true,
                'candidates' => $candidates
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching candidates: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Get candidates from applications (API endpoint)
     */
    public function getCandidatesFromApplications()
    {
        try {
            $candidates = Application::select('id', 'full_name', 'email', 'nic', 'telephone', 'programe', 'created_at')
                                   ->orderBy('created_at', 'desc')
                                   ->get();
            
            return response()->json([
                'success' => true,
                'candidates' => $candidates
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching candidates: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * View candidate details page
     */
    public function viewCandidate($id)
    {
        try {
            // Get application with candidate details
            $application = Application::with('candidate')->find($id);
            
            if (!$application) {
                return redirect()->back()->with('error', 'Candidate not found.');
            }
            
            // Prepare comprehensive candidate data
            $candidate = (object)[
                'id' => $application->id,
                'application_id' => $application->id,
                'candidate_id' => $application->candidate_id,
                
                // Personal Information
                'full_name' => $application->candidate->full_name ?? 'N/A',
                'email' => $application->candidate->email ?? 'N/A',
                'nic' => $application->candidate->nic ?? 'N/A',
                'telephone' => $application->candidate->telephone ?? 'N/A',
                
                // Educational Background
                'undergraduate_degree' => $application->candidate->undergraduate_degree ?? 'N/A',
                'university' => $application->candidate->university ?? 'N/A',
                'year' => $application->candidate->year ?? 'N/A',
                'field' => $application->candidate->field ?? 'N/A',
                'gpa_class' => $application->candidate->gpa_class ?? 'N/A',
                
                // Application Information
                'programe' => $application->intended_degree ?? 'N/A',
                'discipline_area' => $application->discipline_area ?? 'N/A',
                'status' => $application->status ?? 'pending',
                
                // Timestamps
                'created_at' => $application->created_at,
                'updated_at' => $application->updated_at
            ];
            
            return view('admin.candidate-details', compact('candidate'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading candidate details: ' . $e->getMessage());
        }
    }

    /**
     * Update application status to approved
     */
    public function approveCandidate(Request $request, $id)
    {
        try {
            $application = Application::find($id);
            
            if (!$application) {
                return response()->json([
                    'success' => false,
                    'message' => 'Application not found'
                ]);
            }
            
            // Update status to approved
            $application->status = 'approved';
            $application->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Application approved successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error approving application: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Reject candidate - delete from both Application and Candidate tables
     */
    public function rejectCandidate(Request $request, $id)
    {
        try {
            $application = Application::find($id);
            
            if (!$application) {
                return response()->json([
                    'success' => false,
                    'message' => 'Application not found'
                ]);
            }
            
            // Get candidate ID before deleting application
            $candidateId = $application->candidate_id;
            
            // Delete the application first
            $application->delete();
            
            // Then delete the candidate
            $candidate = Candidate::find($candidateId);
            if ($candidate) {
                $candidate->delete();
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Candidate rejected and removed successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error rejecting candidate: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Update application status (general function)
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $application = Application::find($id);
            
            if (!$application) {
                return response()->json([
                    'success' => false,
                    'message' => 'Application not found'
                ]);
            }
            
            $status = $request->input('status');
            
            // Validate status
            if (!in_array($status, ['pending', 'under_review', 'accepted', 'rejected', 'approved'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid status'
                ]);
            }
            
            // If rejecting, delete both records
            if ($status === 'rejected') {
                return $this->rejectCandidate($request, $id);
            }
            
            // Otherwise just update status
            $application->status = $status;
            $application->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status: ' . $e->getMessage()
            ]);
        }
    }
}