        <nav class="bg-light p-3" style="width: 250px; height: 100vh;">
            <h5 class="text-uppercase fw-bold">{{ config('app.name') }}</h5>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link  {{ request()->is('/') ? 'active text-primary fw-bold' : 'text-dark' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <div class="nav-link">
                        <span class="text-uppercase text-muted small">Manajemen</span>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tarif') || request()->is('tarif/*') ? 'active text-primary fw-bold' : 'text-dark' }} " href="{{ route('tarif.index') }}">
                        <i class="bi bi-lightning-fill"></i> Tarif Listrik
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pelanggan') || request()->is('pelanggan/*') ? 'active text-primary fw-bold' : 'text-dark' }}" href="{{ route('pelanggan.index')}}">
                        <i class="bi bi-people-fill"></i> Pelanggan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tagihan') || request()->is('tagihan/*') ? 'active text-primary fw-bold' : 'text-dark' }}" href="{{ route('tagihan.index') }}">
                        <i class="bi bi-receipt"></i> Tagihan
                    </a>
                </li>
            </ul>
        </nav>
