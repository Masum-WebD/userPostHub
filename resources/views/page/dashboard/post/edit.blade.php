@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input Field -->
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                        value="{{ $post->title }}" required>
                </div>

                <div class="form-group">
                    <label for="img">Upload New Image:</label> <br>
                    <img src="{{ asset($post->img) }}" width="50">
                    <input type="file" class="form-control-file mt-2" id="img" name="img" accept="image/*">
                </div>

                <div class="form-group mt-3">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status"
                        @if ($post->status == 1) selected @endif required>
                        <option value="1" @if ($post->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($post->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </section>
@endsection
