<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Timeline;
use App\Models\User_phase;
class TimelineController extends Controller
{
// In PHP, you cannot place executable code (like creating an array) directly inside a class but outside of a method or property.
// Only properties and methods are allowed at the class level.
// If you want to store an associative array, you can define it as a property:

public $timeline = [
    [ 
    'phase' => 0,
    'name' => 'Assigning Supervisor',
    'data' => ['supervisor_sd','supervisor_ed'],
    'notification' => ['Supervisor Assigned']
     
    ],
    [ 
    'phase' => 1,
    'name' => 'sem1',
    'data' => ['sem1_sd','sem1_ed'],
    'notification' => ['Semester 1 Started', 'Semester 1 Ended']
    ],
    [
    'phase' => 2,
    'name' => 'sem2',
    'data' => ['sem2_sd','sem2_ed'],
    'notification' => ['Semester 2 Started', 'Semester 2 Ended']
    ],
    [
    'phase' => 3,
    'name' => 'viva',
    'data' => ['viva_sd','viva_ed'],
    'notification' => ['Viva Started', 'Viva Ended']
    ],
    [
    'phase' => 4,
    'name' => 'Final thesis',
    'data' => ['finals_sd','finals_ed'],
    'notification' => ['Final Thesis Started', 'Final Thesis Ended']
    ],
    [
    'phase' => 5,
    'name' => 'waiting',  
    'data' => ['graduated_sd','graduated_ed']],
    'notification' => ['Graduation Started', 'Graduation Ended']
];

  public $currentPhase = 0;
  

  public function __construct()
  {
      // Load current phase from database for the authenticated user
      if (auth()->check()) {
          $this->currentPhase = \App\Models\User_phase::select('currentphase')
                                 ->where('email', auth()->user()->email)
                                 ->value('currentphase') ?? 0;
      }

     
  }

  public function getColumndate(){
    $dates = \App\Models\Timeline::select($this->timeline[$this->currentPhase]['data'][0], $this->timeline[$this->currentPhase]['data'][1])
                                  ->where('id', 2025)
                                  ->first();

   
    return $dates;
  }

  public function getVivadates(){
    $dates = User_phase::select($this->timeline[$this->currentPhase]['data'][0], $this->timeline[$this->currentPhase]['data'][1])
                                  ->where('email', auth()->user()->email)
                                  ->first();
    return $dates;
  }

 public function showTimeline(){

    //check for viva phase
 
   if($this->currentPhase == 3){

     $dates =$this->getVivadates();

     if (
        !$dates ||
        
        $dates->{$this->timeline[$this->currentPhase]['data'][1]} === '0000-00-00'
    ) {
        // Handle case where no valid date is found
        
        return view('timeline', ['currentPhase' => $this->currentPhase]);
    }

   }else{ 

    //for other phases

    $dates = $this->getColumndate();
    
    
    if (
        !$dates ||
        
        $dates->{$this->timeline[$this->currentPhase]['data'][1]} === '0000-00-00'
    ) {
        // Handle case where no valid date is found
        
        return view('timeline', ['currentPhase' => $this->currentPhase]);
    }
    
    }

    //for anycondtions

    $endDate = $dates->{$this->timeline[$this->currentPhase]['data'][1]};
    
    
    $checkdate = strtotime($endDate) - strtotime(date('Y-m-d'));
     

    if($checkdate <= 0){
        // Move to next phase
        $newPhase = $this->currentPhase + 1;
        
        if (auth()->check()) {
            \App\Models\User_phase::where('email', auth()->user()->email)
                                  ->update(['currentphase' => $newPhase]);
        }
        
        // Update the local property
        $this->currentPhase = $newPhase;
   }

   return $this; // Return the controller instance
}


public function processCountdown(){
    $dates = $this->getColumndate();
     $end_date = $dates->{$this->timeline[$this->currentPhase]['data'][1]};

    $now = now();
    if ($now > $end_date) {
        return [
            'years' => 0,
                'months' => 0,
                'days' => 0,
            ];
        }

        $diff = $now->diff($end_date);

        return [
            'years' => $diff->y,
            'months' => $diff->m,
            'days' => $diff->d,
        ];
    
}

public function index(){
    $this->showTimeline();
    $this->processCountdown();
    return view('timeline');
}

}