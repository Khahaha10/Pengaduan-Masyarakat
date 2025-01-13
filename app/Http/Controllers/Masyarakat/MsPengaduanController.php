<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengaduanModel;
use Illuminate\Log;

class MsPengaduanController extends Controller
{
    public function index()
    {
        $masyarakat = Auth::user(); 


        $pengaduan = PengaduanModel::where('id_masyarakat', $masyarakat->id_masyarakat)
                                    ->with('masyarakatYangMembuat')
                                    ->orderBy('created_at', 'desc') 
                                    ->with('tanggapan')
                                    ->get();


        return view('masyarakat.pengaduan.pengaduan', compact('pengaduan'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul_pengaduan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'isi_pengaduan' => 'required|string',
            ]);

            if ($request->hasFile('foto')) {
                $fotoName = time() . '.' . $request->foto->getClientOriginalExtension();
                $request->foto->move(public_path('storage/pengaduan'), $fotoName);
            } else {
                $fotoName = null;
            }

            PengaduanModel::create([
                'id_masyarakat' => Auth::id(),
                'judul_pengaduan' => $request->judul_pengaduan,
                'foto' => $fotoName, 
                'isi_pengaduan' => $request->isi_pengaduan,
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Pengaduan berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengajukan pengaduan.');
        }
    }

    public function show($id)
    {
        $pengaduan = PengaduanModel::findOrFail($id);

        if ($pengaduan->nik != Auth::guard('masyarakat')->user()->nik) {
            abort(403, 'Unauthorized access.');
        }

        return view('pengaduan.show', compact('pengaduan'));
    }

    public function edit($id)
    {
        $pengaduan = PengaduanModel::findOrFail($id);

        if ($pengaduan->nik != Auth::guard('masyarakat')->user()->nik) {
            abort(403, 'Unauthorized access.');
        }

        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $pengaduan = PengaduanModel::findOrFail($id);

            if ($pengaduan->id_masyarakat != Auth::id()) {
                abort(403, 'Unauthorized access.');
            }

            $request->validate([
                'judul_pengaduan' => 'required|string|max:255',
                'isi_pengaduan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $pengaduan->judul_pengaduan = $request->judul_pengaduan;
            $pengaduan->isi_pengaduan = $request->isi_pengaduan;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('storage/pengaduan'), $fotoName);

                if ($pengaduan->foto && file_exists(public_path('storage/pengaduan/' . $pengaduan->foto))) {
                    unlink(public_path('storage/pengaduan/' . $pengaduan->foto));
                }

                $pengaduan->foto = $fotoName;
            }

            $pengaduan->save();

            return redirect()->back()->with('success', 'Pengaduan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui pengaduan.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $pengaduan = PengaduanModel::findOrFail($id);

            if ($pengaduan->foto && file_exists(public_path('storage/pengaduan/' . $pengaduan->foto))) {
                unlink(public_path('storage/pengaduan/' . $pengaduan->foto));
            }

            $pengaduan->delete();
            
            return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pengaduan.');
        }
    }

}
