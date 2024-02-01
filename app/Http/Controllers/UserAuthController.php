<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function signup()
    {
        return view('page.auth.signUp');
    }

    public function registration(Request $request)
    {
        try {
            $request->validate([
                'firstName' => 'required|string|max:100',
                'lastName' => 'required|string|max:100',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            auth()->attempt($request->only('email','password'));

            return redirect()->route('post.list');
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        return view('page.auth.login');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:6'
            ]);

            $user = User::where('email', $request->input('email'))->first();
            if(!$user || !Hash::check($request->input('password'), $user->password)){
                return response()->json(['status' => 'failed', 'message' => 'Invalid user']);
            }
            auth()->attempt($request->only('email','password'));

            return redirect()->route('post.list');

        } catch (Exception $e)  {
            return response()->json(['status' => 'error', 'message' =>$e->getMessage()]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }


}
