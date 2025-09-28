<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitionController extends Controller
{
    
 public function submition(Request $req){
    
         $req->file('report-submitin')->store('documents');

        return view('evaluation');
 }

}
