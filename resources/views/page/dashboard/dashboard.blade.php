@extends('layouts.app')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="bg-dark col-auto col-md-2 min-vh-100">
                    <div class="bg-dark p-2">
                        <a class="d-flex text-decoration-none mt-1 align-items-center text-white" href="">
                            <i class="fs-5 fa fa-guage"></i><span class="fs-5 d-none d-sm-inline">Dashboard</span>
                        </a>
                        <ul class="nav nav-pills flex-column mt-4">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{url('dashboard/profile')}}" aria-current="page">
                                    <i class="far fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{url('dashboard/post')}}" aria-current="page">Post</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
