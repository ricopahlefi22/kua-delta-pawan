<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard()
    {
        if(Auth::guard('admin')->user()){
            $data['title'] = 'Data Administrator';

            return view('admin.dashboard', $data);
        }
    }
}
