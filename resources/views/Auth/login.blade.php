@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-primary text-white text-center fs-4 fw-bold">
                Login
            </div>
            <div class="card-body p-4">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                        </div>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Login Button (Aligned Left) -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary fw-semibold w-auto">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection
    