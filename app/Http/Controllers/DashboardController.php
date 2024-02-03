<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    function profile(Request $request)
    {
        $user=Auth::user();
        return view('page.dashboard.profile');
    }
}
