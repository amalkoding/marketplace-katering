<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 id="sidebarLabel" class="m-0 text-white">{{ env('APP_NAME') }}</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded {{ Route::is('dashboard*') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            @if(auth()->user()->role == "merchant")
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded {{ Route::is('merchant.profile*') ? 'active' : '' }}"
                    href="{{ route('merchant.profile.index') }}">
                    <i class="bi bi-person-circle me-2"></i> Pengelolaan Profil Merchant
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded {{ Route::is('menu*') ? 'active' : '' }}"
                    href="{{ route('menu.index') }}">
                    <i class="bi bi-list-ul me-2"></i> Pengelolaan Menu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded {{ Route::is('order*') ? 'active' : '' }}"
                    href="{{ route('order.index') }}">
                    <i class="bi bi-cart me-2"></i> Daftar Order
                </a>
            </li>
            @elseif(auth()->user()->role == "customer")
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded{{ Route::is('catering-customer*') ? 'active' : '' }}"
                    href="{{ route('catering-customer.index') }}">
                    <i class="bi bi-search me-2"></i> Daftar Merchant Catering
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center rounded {{ Route::is('order-customer*') ? 'active' : '' }}"
                    href="{{ route('order-customer.index') }}">
                    <i class="bi bi-cart me-2"></i> Order Customer
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>