<header id="page-header">
    <div class="content-header">
        <div>
            <a class="fw-semibold fs-4" href="{{ route('dashboard') }}">
                Trivia App
            </a>
        </div>
        @auth
        <div>
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fa fa-user-circle ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-user me-1"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt me-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endauth

    </div>
</header>
