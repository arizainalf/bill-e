@extends('layouts.auth')

@section('title', 'Register')

@push('styles')
@endpush

@section('main')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h3 class="text-center">Bill-e</h3>
            <h5 class="text-center mb-4">Register</h5>
            <form method="POST" action="{{ route('saveRegister') }}">
                <!-- CSRF Token -->
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <!-- Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <small>Already have an account? <a href="{{ route('login') }}">Sign In</a></small>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
