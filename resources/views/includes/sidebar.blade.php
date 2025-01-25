<div class="offcanvas offcanvas-start bg-white" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 id="sidebarLabel" class="m-0">{{ env('APP_NAME') }}</h5>
        <button type="button" class="btn-close text-reset border-0 shadow-none" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded {{ Route::is('dashboard*') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            @if(auth()->user()->role == "admin")
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded {{ Route::is('user*') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <i class="bi bi-person me-2"></i> Pengelolaan User
                </a>
            </li>
            @elseif(auth()->user()->role == "premium")
            //
            @elseif(auth()->user()->role == "user")
            //
            @endif
        </ul>
    </div>
</div>