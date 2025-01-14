<nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-sm py-3">
    <div class="container-lg">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="d-lg-flex d-none align-items-center bg-white rounded-pill border mx-auto py-1 px-2">
            <div class="bg-dark text-white rounded-pill py-1 px-3">
                <p class="fw-semibold mb-0">@yield('title')</p>
            </div>
            <p class="text-muted mb-0 mx-2">@yield('description')</p>
        </div>
        <div class="d-flex">
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2"></i> {{ auth()->user()->name }} - {{ auth()->user()->role }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-4"
                    aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item text-dark" href="{{ route('profile') }}">Profil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>