<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ auth()->check() ? route('home') : route('login') }}">KursusKu</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('enrollments.create') }}">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('enrollments.index') }}">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Profil Saya</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('keluar') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">
                                Logout ({{ Auth::user()->name }})
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>