<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class adminLogin extends Controller
{
    function adminLogin(Request $req){
        $admin = Admin::where('username', $req->input('admin_username'))
                      ->where('password', $req->input('admin_password'))
                      ->first();
        
        if($admin) {

            $data =  Admin::select('username')->where('username', $admin->username)->first();
            $req->session()->put('admin', $data->username);

            return redirect('/admin/admin-dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }
}
