<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Profil</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto px-4">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow p-6 text-center">
                @if($profile)
                    <img
                        src="{{ $profile->photo ? Storage::url($profile->photo) : 'https://ui-avatars.com/api/?name='.urlencode($profile->name).'&size=200' }}"
                        class="w-28 h-28 rounded-full object-cover mx-auto mb-3 ring-4 ring-indigo-400"
                    >
                    <h2 class="text-xl font-bold text-gray-800">{{ $profile->name }}</h2>
                    <p class="text-indigo-500 font-medium">{{ $profile->title }}</p>
                    <p class="text-gray-500 text-sm mt-2">{{ $profile->bio }}</p>
                    <div class="mt-3 text-sm text-gray-500 space-y-1">
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
                    <p class="text-gray-400 mb-4">Profil belum diisi, silakan lengkapi!</p>
                @endif

                <a href="{{ route('profile.edit') }}"
                   class="mt-5 inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 font-semibold">
                    ✏️ Edit Profil
                </a>
            </div>

        </div>
    </div>
</x-app-layout>