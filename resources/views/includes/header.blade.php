<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown" aria-expanded="false">
                    @if (!empty(auth()->user()->profile_picture()))
                        <img
                            src="{{ asset("storage/profiles/" . auth()->user()->profile_picture()) }}"
                            class="avatar img-fluid rounded-circle mr-1"
                            alt="{{ auth()->user()->name }}"
                        />
                    @else
                        <img
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=293042&color=ffffff"
                            class="avatar img-fluid rounded-circle mr-1"
                            alt="{{ auth()->user()->name }}"
                        />
                    @endif

                    <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profile.index', 'account') }}">
                        <i class="align-middle me-1" data-feather="user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
