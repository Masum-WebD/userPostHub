@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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

                <div class="form-group mt-3">
                    <img src="{{ asset($post->img) }}" alt="Current Image" width="50">
                </div>

                <!-- Image Upload Field -->
                <div class="form-group">
                    <label for="img">Upload New Image:</label> <br>
                    <input type="file" class="form-control-file" id="img" name="img" accept="image/*" >
                </div>

                <!-- Status Dropdown -->
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
