@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-6 animate__animated animate__fadeIn">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white text-center fs-4 fw-bold">
                Dashboard
            </div>
            <div class="card-body p-4">
                <!-- Display Success Message -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
                        <strong>Success!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
                        <strong>Welcome back!</strong> You are logged in!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- User Info Section -->
                <div class="mt-4">
                    <h5 class="fw-semibold">Hello, {{ Auth::user()->name }}!</h5>
                    <p class="text-muted">Welcome to your dashboard! Here, you can see your recent activity and manage your profile information.</p>
                    
                    <!-- User Details -->
                    <div class="mb-3">
                        <span class="badge bg-info text-dark">Email:</span> <span class="text-muted">{{ Auth::user()->email }}</span>
                    </div>
                    
                    <!-- Placeholder for recent activity -->
                    <div class="mt-3">
                        <h6 class="fw-bold">Recent Activity</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Logged in on <span class="text-muted">{{ now()->format('d M, Y H:i') }}</span></li>
                            <li class="list-group-item">Viewed dashboard last week</li>
                            <!-- Additional recent activity items can go here -->
                        </ul>
                    </div>
                </div>

                <!-- Logout Button -->
                <div class="d-flex justify-content-center mt-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-lg fw-semibold">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection
