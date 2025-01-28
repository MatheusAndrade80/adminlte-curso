<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}" class="brand-link d-flex align-items-center">
            <img src="{{ Vite::asset('resources/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow me-2" />
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>
    <div class="sidebar-wrapper flex-grow-1 overflow-auto">
        <nav class="mt-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center">
                        <i class="nav-icon bi bi-person me-2"></i>
                        <p class="mb-0">Usuários</p>
                    </a>
                </li>

                <li class="nav-header mt-3">LABELS</li>

                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="nav-icon bi bi-circle text-danger me-2"></i>
                        <p class="mb-0">Important</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="nav-icon bi bi-circle text-warning me-2"></i>
                        <p class="mb-0">Warning</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center">
                        <i class="nav-icon bi bi-circle text-info me-2"></i>
                        <p class="mb-0">Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
