<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Foto Profil' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-sm text-center">
        @if($profile)
            <img
                src="{{ $profile->photo ? Storage::url($profile->photo) : 'https://ui-avatars.com/api/?name='.urlencode($profile->name).'&size=200' }}"
                alt="Foto Profil"
                class="w-32 h-32 rounded-full object-cover mx-auto mb-4 ring-4 ring-indigo-400"
            >
            <h1 class="text-2xl font-bold text-gray-800">{{ $profile->name }}</h1>
            <p class="text-indigo-500 font-medium mt-1">{{ $profile->title }}</p>
            <p class="text-gray-500 mt-3 text-sm">{{ $profile->bio }}</p>
            <div class="mt-4 text-sm text-gray-500 space-y-1">
                @if($profile->email)
                    <p>📧 {{ $profile->email }}</p>
                @endif
                @if($profile->phone)
                    <p>📱 {{ $profile->phone }}</p>
                @endif
                @if($profile->location)
                    <p>📍 {{ $profile->location }}</p>
                @endif
            </div>
        @else
            <p class="text-gray-400">Profil belum diisi.</p>
        @endif
        <a href="{{ route('login') }}" class="mt-6 inline-block text-xs text-gray-400 hover:text-indigo-400">Admin Login</a>
    </div>
</body>
</html>