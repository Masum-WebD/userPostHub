<div class="bg-danger-subtle">
    <nav class="navbar navbar-expand-lg navbar-light  container">
        <a class="navbar-brand" href="{{url('/')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                @auth
                    <div class="dropdown">
                        <a class=" dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('assets/img/profile.png') }}" alt="Profile Picture" width="30"
                                height="30" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <a class="dropdown-item" href="{{url('dashboard/profile')}}">Profile</a>
                            <a class="dropdown-item" href="{{url('dashboard')}}">Dashboard</a>
                            <div class="dropdown-divider"></div>

                            <form action="{{route('logout')}}" method="POST" >
                                @csrf
                                <button type="submit" class="dropdown-item" href="#">Logout</button>
                            </form>
                        </ul>
                    </div>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-bold" href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bold" href="{{ url('signup') }}">Sign Up</a>
                    </li>
                @endguest



            </ul>
        </div>
    </nav>
</div>
