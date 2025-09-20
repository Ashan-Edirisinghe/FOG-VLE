<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;

class TimeController extends Controller
{
    public function created_date()
    {
        // Get the current authenticated user
        $user = auth()->user();
        
        
        // Get the candidate associated with the user
        $candidate = $user->candidate;
        
        
        // Get the latest application for the candidate
        $application = $candidate->applications()->latest()->first();
        
        if (!$application) {
            return null;
        }
        
        return $application->created_at;
    }

    public function deadline()
    {
        $createdDate = $this->created_date();

        if (!$createdDate) {
            return null;
        }

        return $createdDate->copy()->addYears(4);
    }


    public function countdown()
    {
        $targetDate = $this->deadline();

        if (!$targetDate) {
            return null;
        }

        $now = now();
        if ($now > $targetDate) {
            return [
                'years' => 0,
                'months' => 0,
                'days' => 0,
            ];
        }

        $diff = $now->diff($targetDate);

        return [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
        ];
    }
      
   
 
    

    public function showTimeline()
    {
        // Call all functions
        $this->created_date();
        $this->deadline();
        $this->countdown();
        
        return view('timeline');
    }
}
