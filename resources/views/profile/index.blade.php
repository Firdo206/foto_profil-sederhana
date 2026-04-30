@php
    $profile = \App\Models\Profile::first();
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $profile->name ?? 'Profil Saya' }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css-template/styles.css') }}" />
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="#">
                <span class="fw-bolder text-gradient">{{ $profile->name ?? 'Profil Saya' }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="btn btn-primary px-4 py-2 ms-3" href="{{ route('login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-primary-to-secondary py-5" id="tentang">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6 text-center text-white">
                    @if($profile && $profile->photo)
                        <img src="{{ Storage::url($profile->photo) }}"
                             class="rounded-circle mb-4"
                             style="width:150px; height:150px; object-fit:cover; border:4px solid white;">
                    @endif
                    <h1 class="display-5 fw-bolder text-white mb-2">
                        {{ $profile->name ?? 'Nama Belum Diisi' }}
                    </h1>
                    <p class="lead fw-normal text-white-50 mb-3">
                        {{ $profile->title ?? '' }}
                    </p>
                    <p class="text-white-50 mb-4">
                        {{ $profile->bio ?? 'Bio belum diisi.' }}
                    </p>
                    <a href="#kontak" class="btn btn-light btn-lg px-5 py-3">Lihat Kontak</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-5 bg-light" id="kontak">
        <div class="container px-5">
            <h2 class="fw-bolder text-center mb-5">Informasi Kontak</h2>
            <div class="row gx-5 justify-content-center">

                @if($profile && $profile->email)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body py-4">
                            <i class="fas fa-envelope fa-2x text-gradient mb-3"></i>
                            <h5 class="fw-bolder">Email</h5>
                            <p class="text-muted mb-0">{{ $profile->email }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($profile && $profile->phone)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body py-4">
                            <i class="fas fa-phone fa-2x text-gradient mb-3"></i>
                            <h5 class="fw-bolder">Telepon</h5>
                            <p class="text-muted mb-0">{{ $profile->phone }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($profile && $profile->location)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center shadow-sm">
                        <div class="card-body py-4">
                            <i class="fas fa-map-marker-alt fa-2x text-gradient mb-3"></i>
                            <h5 class="fw-bolder">Lokasi</h5>
                            <p class="text-muted mb-0">{{ $profile->location }}</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-muted">
        <div class="container">
            &copy; {{ date('Y') }} {{ $profile->name ?? 'Foto Profil' }}
        </div>
    </footer>

    <script src="{{ asset('js-template/scripts.js') }}"></script>
</body>
</html>