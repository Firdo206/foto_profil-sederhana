<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Foto Profil')</title>

    <!-- Font Awesome (dari template) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

    <!-- CSS dari template Bootstrap Personal -->
    <link rel="stylesheet" href="{{ asset('css-template/styles.css') }}" />

    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('profile.dashboard') }}">
                {{ Auth::user()->name ?? 'Profil Saya' }}
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Edit Profil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- JS dari template -->
    <script src="{{ asset('js-template/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>