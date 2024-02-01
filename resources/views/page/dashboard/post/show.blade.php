@extends('layouts.app')
{{-- @extends('page.dashboard.dashboard') --}}

@section('content')
    <section>
        <div class="mx-5">
            <h2>Post Page</h2>
            <div class="row mb-3 mt-2">
                <div class="col-md-4">
                    <form action="{{ route('post.list') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <span class="input-group-text">Filter by Date</span>
                            <input type="date" class="form-control" name="filter_date" value="{{ request('filter_date') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Search</button>
                        <button type="submit" class="btn btn-danger" id="resetBtn">Reset</button>
                    </form>

                </div>
                <div class="col-md-8 text-end">
                    <a href="{{ url('dashboard/post/create') }}" class="btn btn-primary">Create New Post</a>
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset($post->img) }}" width="50">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>

                            </td>
                            @if ($post->status == true)
                                <td scope="col">Active</td>
                            @else
                                <td scope="col">Inactive</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </section>


@endsection
