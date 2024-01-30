@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input Field -->
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                </div>
                <div class="form-group ">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                </div>

                <!-- Image Upload Field -->
                <div class="form-group mt-3">
                    <label for="img" >Upload Image:</label> <br>
                    <input type="file" class="form-control-file pt-1" id="img" name="img" accept="image/*" required>
                </div>


                <!-- Status Dropdown -->
                <div class="form-group mt-3">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </section>
@endsection
