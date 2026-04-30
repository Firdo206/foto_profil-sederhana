@extends('layouts.bootstrap-personal')

@section('title', 'Dashboard Admin')

@section('content')

<div class="min-vh-100 bg-light py-5" style="padding-top: 80px !important;">
    <div class="container px-4">

        <!-- Header Dashboard -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #1e30f3 0%, #e21e80 100%); border-radius: 1rem;">
                    <div class="card-body p-4 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-4">
                            @if($profile && $profile->photo)
                                <img src="{{ Storage::url($profile->photo) }}"
                                     class="rounded-circle"
                                     style="width:80px; height:80px; object-fit:cover; border:3px solid white;">
                            @else
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center"
                                     style="width:80px; height:80px;">
                                    <i class="fas fa-user fa-2x text-primary"></i>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-white fw-bold mb-1">
                                    Halo, {{ $profile->name ?? Auth::user()->name }}! 👋
                                </h4>
                                <p class="text-white-50 mb-0">
                                    {{ $profile->title ?? 'Belum ada jabatan' }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-light fw-semibold px-4">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style="width:48px; height:48px; background: linear-gradient(135deg, #1e30f3, #e21e80);">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <h6 class="fw-bold mb-0 text-muted text-uppercase" style="font-size:0.75rem; letter-spacing:1px;">Email</h6>
                        </div>
                        <p class="fw-semibold mb-0">{{ $profile->email ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style="width:48px; height:48px; background: linear-gradient(135deg, #1e30f3, #e21e80);">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <h6 class="fw-bold mb-0 text-muted text-uppercase" style="font-size:0.75rem; letter-spacing:1px;">Telepon</h6>
                        </div>
                        <p class="fw-semibold mb-0">{{ $profile->phone ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 1rem;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style="width:48px; height:48px; background: linear-gradient(135deg, #1e30f3, #e21e80);">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <h6 class="fw-bold mb-0 text-muted text-uppercase" style="font-size:0.75rem; letter-spacing:1px;">Lokasi</h6>
                        </div>
                        <p class="fw-semibold mb-0">{{ $profile->location ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bio Card -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 1rem;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-user-circle me-2 text-primary"></i>Bio
                        </h5>
                        <p class="text-muted mb-0">
                            {{ $profile->bio ?? 'Bio belum diisi. Klik Edit Profil untuk menambahkan.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row g-3">
            <div class="col-md-6">
                <a href="{{ route('profile.edit') }}"
                   class="btn w-100 py-3 fw-semibold text-white"
                   style="background: linear-gradient(135deg, #1e30f3, #e21e80); border-radius: 0.75rem; border: none;">
                    <i class="fas fa-edit me-2"></i>Edit Profil Saya
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/') }}"
                   class="btn w-100 py-3 fw-semibold btn-outline-secondary"
                   style="border-radius: 0.75rem;">
                    <i class="fas fa-eye me-2"></i>Lihat Halaman Publik
                </a>
            </div>
        </div>

    </div>
</div>

@endsection