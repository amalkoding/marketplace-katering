<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container-lg">
        <button class="btn border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar">
            <i class="bi bi-list fs-4"></i>
        </button>
        <div class="d-flex">
            <div class="dropdown">
                <button class="btn border-0 dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person me-2"></i>{{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-4"
                    aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
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