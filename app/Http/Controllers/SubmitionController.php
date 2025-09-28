<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitionController extends Controller
{
    
 public function submition(Request $req){

    // Check if file exists before storing
    if ($req->hasFile('report-submission')) {
        $file = $req->file('report-submission');
        $originalName = $file->getClientOriginalName();
        
        // Add timestamp to avoid filename conflicts
        $fileName = time() . '_' . $originalName;
        
        // Store with timestamp + original filename
        $filePath = $file->storeAs('documents', $fileName);
        
        return redirect()->back()->with([
            'success' => 'File uploaded successfully!',
            'fileName' => $fileName,
            'filePath' => $filePath
        ]);
    }
    
    // If no file, redirect back with error
    return back()->with('error', 'Please select a file to upload');
       
 }

}
