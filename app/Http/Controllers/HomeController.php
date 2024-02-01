<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        // $posts = Post::all();

        return view('page.index');
    }

    public function getPosts(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::query();

            // Add date filtering logic
            if($request->input('filter_date')){

                if ($request->has('filter_date')) {
                    $query->whereDate('created_at', $request->input('filter_date'));
                }
            }

            $data = $query->latest()->get();
            // $data = Post::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($user) {
                    return [
                        'display' => e($user->created_at->format('Y-m-d')),
                        'timestamp' => $user->created_at->timestamp
                    ];
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
