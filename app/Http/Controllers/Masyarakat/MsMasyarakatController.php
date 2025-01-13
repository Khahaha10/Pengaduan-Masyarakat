<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasyarakatModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MsMasyarakatController extends Controller
{

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:16',
            'nama_masyarakat' => 'required|string|max:255',
            'email' => 'required|email',
            'telp' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $masyarakat = MasyarakatModel::findOrFail($id);
        $masyarakat->nik = $request->nik;
        $masyarakat->nama_masyarakat = $request->nama_masyarakat;
        $masyarakat->email = $request->email;
        $masyarakat->telp = $request->telp;

        if ($request->hasFile('foto_profil')) {
            if ($masyarakat->foto_profil && Storage::exists('public/foto_masyarakat/' . $masyarakat->foto_profil)) {
                Storage::delete('public/foto_masyarakat/' . $masyarakat->foto_profil);
            }

            $fileName = time() . '_' . $request->file('foto_profil')->getClientOriginalName();
            $request->file('foto_profil')->storeAs('public/foto_masyarakat', $fileName);
            $masyarakat->foto_profil = $fileName;
        }
        
        if ($request->filled('password')) {
            $masyarakat->password = Hash::make($request->password);
        }

        $masyarakat->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }


}
