<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PtPetugasController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email',
            'telp' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $petugas = PetugasModel::findOrFail($id);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->email = $request->email;
        $petugas->telp = $request->telp;

        if ($request->hasFile('foto_profil')) {
            if ($petugas->foto_profil && Storage::exists('public/foto_petugas/' . $petugas->foto_profil)) {
                Storage::delete('public/foto_petugas/' . $petugas->foto_profil);
            }

            $fileName = time() . '_' . $request->file('foto_profil')->getClientOriginalName();
            $request->file('foto_profil')->storeAs('public/foto_petugas', $fileName);
            $petugas->foto_profil = $fileName;
        }

        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
