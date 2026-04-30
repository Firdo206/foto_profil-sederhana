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
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css-template/styles.css') }}" />
</head>
<body id="page-top">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">{{ $profile->name ?? 'Profil Saya' }}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="text-center">
                @if($profile && $profile->photo)
                    <img src="{{ Storage::url($profile->photo) }}"
                         class="rounded-circle mb-4"
                         style="width:150px; height:150px; object-fit:cover; border: 4px solid white;">
                @endif
                <h1 class="mx-auto my-0 text-uppercase">{{ $profile->name ?? 'Nama Belum Diisi' }}</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">{{ $profile->title ?? '' }}</h2>
                <a class="btn btn-primary" href="#about">Lihat Profil</a>
            </div>
        </div>
    </header>

    <!-- About / Bio -->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Tentang Saya</h2>
                    <p class="text-white-50">{{ $profile->bio ?? 'Bio belum diisi.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="contact-section bg-black" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">

                @if($profile && $profile->email)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">{{ $profile->email }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($profile && $profile->phone)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-phone text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Telepon</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">{{ $profile->phone }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if($profile && $profile->location)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marker-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Lokasi</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">{{ $profile->location }}</div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">
            &copy; {{ date('Y') }} {{ $profile->name ?? 'Foto Profil' }}
        </div>
    </footer>

    <script src="{{ asset('js-template/scripts.js') }}"></script>
</body>
</html>