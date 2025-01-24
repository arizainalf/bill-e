            <header class="d-flex justify-content-between align-items-center p-3 shadow-sm">
                <h5 class="text-uppercase fw-bold m-0"></h5>
                <div class="d-flex align-items-center">
                    {{-- <input type="text" class="form-control form-control-sm me-3" placeholder="Search"> --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary rounded-circle dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px;">
                            <span class="text-white fw-bold">{{ auth()->user()->name[0] }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-sun-fill me-2"></i> Light Theme
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-moon-fill me-2"></i> Dark Theme
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
