@extends('layouts.app')
{{-- @extends('page.dashboard.dashboard') --}}

@section('content')
    <section>
        <div class="mx-5">
            <h2>Post Page</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">Filter by Date</span>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="btn btn-primary">Create New Post</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{ asset('path/to/post_image.jpg') }}" alt="Post Image" width="50"></td>
                        <td>Sample Post</td>
                        <td>2024-01-30</td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <td><span class="badge bg-success">Published</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </section>
@endsection
