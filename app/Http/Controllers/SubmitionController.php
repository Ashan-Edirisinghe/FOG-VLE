<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitionController extends Controller
{
    
 public function submition(Request $req){

    // Check if file exists before storing
    if ($req->hasFile('report-submission')) {
        $req->file('report-submission')->store('documents');
        return view('evaluation');
    }
    
    // If no file, redirect back with error
    return back()->with('error', 'Please select a file to upload');
       
 }

}
