<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::where('user_id', 1)->first();
        return view('profile.index', compact('profile'));
    }

    public function dashboard()
    {
        $profile = Auth::user()->profile;
        return view('profile.dashboard', compact('profile'));
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'title'    => 'nullable|string|max:100',
            'bio'      => 'nullable|string',
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string|max:20',
            'location' => 'nullable|string|max:100',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user    = Auth::user();
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        $data = $request->only(['name','title','bio','email','phone','location']);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('profile.dashboard')
                         ->with('success', 'Profil berhasil diperbarui!');
    }
}