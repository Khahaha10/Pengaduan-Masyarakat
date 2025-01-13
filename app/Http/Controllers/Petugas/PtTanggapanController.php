<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use Illuminate\Http\Request;

class PtTanggapanController extends Controller
{
    public function store(Request $request, $id_pengaduan)
    {
        $request->validate([
            'status' => 'required|string',
            'tanggapan' => 'required|string',
        ]);

        $pengaduan = PengaduanModel::findOrFail($id_pengaduan);

        TanggapanModel::create([
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'id_petugas' => auth()->user()->id_petugas,
            'isi_tanggapan' => $request->tanggapan,
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Tanggapan berhasil dikirim dan status diperbarui.');
    }

    public function update(Request $request, $id_pengaduan, $id_tanggapan)
    {
        $request->validate([
            'status' => 'required|string',
            'tanggapan' => 'required|string',
        ]);

        $pengaduan = PengaduanModel::findOrFail($id_pengaduan);

        $tanggapan = TanggapanModel::findOrFail($id_tanggapan);

        $tanggapan->update([
            'isi_tanggapan' => $request->tanggapan,
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Tanggapan berhasil diperbarui dan status diperbarui.');
    }
}
