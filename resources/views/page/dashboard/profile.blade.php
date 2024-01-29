@extends('layouts.app')
{{-- @extends('page.dashboard.dashboard') --}}

@section('content')
    <div class="container-fluid">
        <div class="col-10">
            <h2>Profile Details</h2>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" class="form-control" value="{{ auth()->user()->firstName }}"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" value="{{ auth()->user()->email }}"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" value="********" readonly>
                        <small class="form-text text-muted">For security reasons, the password is not displayed
                            here.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
