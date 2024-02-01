@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h2 class="mb-4">All User Posts</h2>
            <form action="{{ route('posts.list') }}" method="POST" class="d-flex mb-3 w-50" id="filterForm">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">Filter by Date</span>
                    <input type="date" class="form-control" name="filter_date" id="filter_date">
                </div>
                <button type="button" class="btn btn-primary mr-2" id="filterBtn">Search</button>
                <button type="button" class="btn btn-danger">Reset</button>
                
            </form>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Date</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </section>


@endsection

