<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard(){
        return view('page.dashboard.dashboard');
    }
    function profile(Request $request)
    {
        $user=Auth::user();
        // dd($user);
        return view('page.dashboard.profile');
    }
}
