<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {

        return view('page.dashboard.post.show');
    }
    function store(Request $request)
    {
        try {
            $request->validate([
                'title' =>'required|string|max:255',
                'img'=> 'required|string|max:200',
                'status' =>'required|boolean'
            ]);
            if($request->hasFile('img')){
                $image=$request->file('img');
                $fileNameStore= 'img'. md5(uniqid()).time().'.'.$image->getClientOrginalExtension();
                $image->move(public_path('public/upload/img'),$fileNameStore);
            }

            $user= Auth::id();

            Post::create([
                'title'=> $request->input('title'),
                'user_id'=> $user,
                'img'=>'path'.$fileNameStore,
                'status'=>$request->input('status')
            ]);



        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
