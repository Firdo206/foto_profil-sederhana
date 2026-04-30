<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Profil</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow p-6">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    {{-- Preview Foto --}}
                    <div class="text-center">
                        <img id="preview"
                            src="{{ $profile && $profile->photo ? Storage::url($profile->photo) : 'https://ui-avatars.com/api/?name=P&size=150' }}"
                            class="w-24 h-24 rounded-full object-cover mx-auto mb-2 ring-4 ring-indigo-300"
                        >
                        <label class="cursor-pointer text-sm text-indigo-600 hover:underline">
                            📷 Ganti Foto
                            <input type="file" name="photo" accept="image/*" class="hidden"
                                onchange="document.getElementById('preview').src = URL.createObjectURL(this.files[0])">
                        </label>
                        @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
                        @error('name') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title / Pekerjaan</label>
                        <input type="text" name="title" value="{{ old('title', $profile->title ?? '') }}"
                            placeholder="contoh: Web Developer"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    </div>

                    {{-- Bio --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" rows="3"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">{{ old('bio', $profile->bio ?? '') }}</textarea>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Publik</label>
                        <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    </div>

                    {{-- Location --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                            placeholder="contoh: Jember, Jawa Timur"
                            class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 font-semibold transition">
                        💾 Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>