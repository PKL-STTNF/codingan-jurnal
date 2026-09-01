<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary" href="{{ route('journals.index') }}">
            <i class="bi bi-journal-bookmark-fill"></i>
            Jurnal PKL
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <!-- Menu -->
            <ul class="navbar-nav ms-4">

                <li class="nav-item">
                    <a href="{{ route('journals.index') }}"
                       class="nav-link {{ request()->routeIs('journals.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i>
                        Data Jurnal

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('panduan') }}"
                        class="nav-link {{ request()->routeIs('panduan') ? 'active' : '' }}">
                        <i class="bi bi-book"></i>
                        Panduan

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('export.index') }}"
                        class="nav-link {{ request()->routeIs('export.*') ? 'active' : '' }}">
                        <i class="bi bi-download"></i>
                        Export
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" 
                        class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="bi bi-person"></i>
                        Profil

                    </a>
                </li>

            </ul>

            <!-- Kanan -->
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        @auth 
                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                             style="width:38px;height:38px;">

                            {{ strtoupper(mb_substr(Auth::user()->name,0,1)) }}

                        </div>

                        <span class="ms-2">

                            {{ Auth::user()->name }}

                        </span>
                        @endauth

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        @auth

                        <li>

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button type="submit" class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                        @else

                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>

                        @endauth

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>