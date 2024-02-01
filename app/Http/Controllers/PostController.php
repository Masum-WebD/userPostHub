<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::id();
        $posts = Post::where('user_id', $user)->get();
        if($request->input('filter_date')){
            $posts = Post::whereDate('created_at', $request->filter_date)->get();
        };

        return view('page.dashboard.post.show')->with('posts', $posts);
    }

    public function create()
    {
        return view('page.dashboard.post.create');
    }
    public function store(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|boolean'
            ]);
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $fileNameStore = 'img' . md5(uniqid()) . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/img/'), $fileNameStore);
            }

            Post::create([
                'title' => $request->input('title'),
                'user_id' => $request->input('user_id'),
                'img' => 'upload/img/' . $fileNameStore,
                'status' => $request->input('status')
            ]);
            return redirect()->route('dashboard.post');
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {

        $post = Post::find($id)->first();
        return view('page.dashboard.post.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|boolean'
            ]);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $fileNameStore = 'img' . md5(uniqid()) . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/img/'), $fileNameStore);
            }

            $post = Post::find($id);


            $post->title = $request->input('title');
            $post->user_id = $request->input('user_id');
            $post->img = 'upload/img/' . $fileNameStore;
            $post->status = $request->input('status');
            $post->save();
            return redirect()->route('dashboard.post');
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
