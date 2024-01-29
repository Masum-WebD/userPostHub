@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Sign Up</h4>
                        </div>
                        <div class="card-body">
                            <form method='post' type='submit' action='{{ route('registration.store') }}'>
                                @csrf
                                @method('post')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="fw-bold">First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your first name" name="firstName"  required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="lastName"
                                            placeholder="Enter your last name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter your email address" required>
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-primary my-3">Sign Up</button>
                            </form>
                            <p>
                                Already have an account, <a href="">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
