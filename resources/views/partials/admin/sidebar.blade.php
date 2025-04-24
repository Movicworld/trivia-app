<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-fire text-primary me-1"></i> Trivia Admin Panel
        </a>
        {{-- <div>
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times"></i>
            </button>
        </div> --}}
    </div>

    <div class="content-side">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-main-link-icon fa fa-house-user"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->routeIs('games') ? 'active' : '' }}" href="{{ route('games') }}">
                    <i class="nav-main-link-icon fa fa-gamepad"></i>
                    <span class="nav-main-link-name">Manage Games</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->routeIs('wallet') ? 'active' : '' }}" href="{{ route('wallet') }}">
                    <i class="nav-main-link-icon fa fa-wallet"></i>
                    <span class="nav-main-link-name">Manage Wallets</span>
                </a>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->routeIs('users') ? 'active' : '' }}" href="{{ route('users') }}">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Manage Users</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                    <span class="nav-main-link-name">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
