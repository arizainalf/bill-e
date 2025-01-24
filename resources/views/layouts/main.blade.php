<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill-E @yield('title') - {{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')

</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->

        @include('components.sidebar')

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            @include('components.header')

            @yield('main')

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

    @stack('scripts')

</body>

</html>
