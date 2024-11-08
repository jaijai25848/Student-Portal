<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Portal - AllPHPTricks.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 1rem;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px; /* Offset content to the right */
            padding: 2rem;
        }
        /* Mobile view adjustment */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand d-block mx-3" href="{{ URL('/') }}">Student Portal</a>
        <ul class="nav flex-column">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                </li>
            @else    
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <div class="collapse" id="userMenu">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

            <!-- Move About, Services, and Contact below Login/Register -->
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ URL('/about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" data-bs-toggle="collapse" data-bs-target="#servicesMenu" aria-expanded="false">Services</a>
                <div class="collapse" id="servicesMenu">
                    <a class="dropdown-item" href="{{ URL('/services/web-development') }}">Web Development</a>
                    <a class="dropdown-item" href="{{ URL('/services/mobile-apps') }}">Mobile Apps</a>
                    <a class="dropdown-item" href="{{ URL('/services/seo') }}">SEO</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ URL('/contact') }}">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="container">
            @yield('content')
            <div class="row justify-content-center text-center mt-3">
                <div class="col-md-12">
                    <p>
                        <a href="/" class="text-decoration-none"><strong>Back to Home</strong></a>
                    </p>
                    <p>
                       Back to Login: <a href="register/" class="text-decoration-none"><strong>login</strong></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
