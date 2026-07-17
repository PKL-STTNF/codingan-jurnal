<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'sekolah' => 'required',
            'tempat_pkl' => 'required',
            'guru_pembimbing' => 'required',
            'instruktur' => 'required',
            'periode' => 'required',
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')
            ->with('success', 'Profil berhasil ditambahkan');
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nama' => 'required',
            'sekolah' => 'required',
            'tempat_pkl' => 'required',
            'guru_pembimbing' => 'required',
            'instruktur' => 'required',
            'periode' => 'required',
        ]);

        $profile->update([
            'nama' => $request->nama,
            'sekolah' => $request->sekolah,
            'tempat_pkl' => $request->tempat_pkl,
            'guru_pembimbing' => $request->guru_pembimbing,
            'instruktur' => $request->instruktur,
            'periode' => $request->periode,
        ]);

        return redirect()->route('profiles.index')
          ->with('success', 'Profil berhasil diupdate');
    }
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('success', 'Profil berhasil dihapus');
    }
}