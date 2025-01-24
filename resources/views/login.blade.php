@extends('layouts.auth')

@section('title', 'Sign In')

@push('styles')
@endpush

@section('main')
    <!-- Login Section -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <!-- Flash Message -->
            <h4 class="text-center mb-2">Bill-e</h4>
            <h5 class="text-center mb-2">Sign In</h5>
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="text-center mt-3">
                <small>Doesn't have an account? <a href="{{ route('register') }}">Register</a></small>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <!-- Pesan akan diganti secara dinamis -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElement = document.getElementById('liveToast');
            const toastBody = toastElement.querySelector('.toast-body');
            const toastHeader = toastElement.querySelector('.toast-header strong');

            // Cek apakah ada session flash
            @if (session('success'))
                toastBody.textContent = "{{ session('success') }}";
                toastElement.classList.add('bg-success', 'text-white');
                toastHeader.textContent = "Success";
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            @elseif (session('error'))
                toastBody.textContent = "{{ session('error') }}";
                toastElement.classList.add('bg-danger', 'text-white');
                toastHeader.textContent = "Error";
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            @endif
        });
    </script>
@endpush
