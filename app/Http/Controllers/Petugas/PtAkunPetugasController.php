<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PetugasModel;
use App\Models\PengaduanModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Exception;

class PtAkunPetugasController extends Controller
{
    public function index()
    {
        $petugas = PetugasModel::where('role', 'petugas')->get();
        
        $pengaduanTanggapan = PengaduanModel::whereIn('status', ['diverifikasi', 'ditolak'])
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        return view('petugas.petugas.petugas', compact('petugas', 'pengaduanTanggapan')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:petugas',
        ]);
        
        PetugasModel::create([
            'nama_petugas' => $request->nama_petugas,
            'telp' => $request->telp,
            'role' => 'petugas',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        

        return redirect()->back()->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_petugas' => 'required|string|max:255',
                'telp' => 'required|string|max:15',
                'email' => 'required|email',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            $petugas = PetugasModel::findOrFail($id);

            $petugas->nama_petugas = $request->nama_petugas;
            $petugas->telp = $request->telp;
            $petugas->email = $request->email;

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

            return redirect()->back()->with('success', 'Petugas berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data petugas: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $petugas = PetugasModel::findOrFail($id);
            $petugas->delete();

            return redirect()->back()->with('success', 'Petugas berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus petugas: ' . $e->getMessage());
        }
    }

}
