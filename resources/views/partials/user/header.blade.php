<header id="page-header">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-alt-secondary me-2" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <h4 class="mb-0">Welcome, {{ Auth::user()->name }}</h4>
        </div>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle" id="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-circle me-1"></i> {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown">
                    <li><a class="dropdown-item" ><i class="fa fa-user me-1"></i> Profile</a></li>
                    <li><a class="dropdown-item" ><i class="fa fa-wallet me-1"></i> Wallet</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                            <i class="fa fa-sign-out-alt me-1"></i> Logout
                        </a>
                        <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
