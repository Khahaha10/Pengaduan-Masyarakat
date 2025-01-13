<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PtPengaduanController extends Controller
{
    public function index()
    {
        $pengaduanPending = PengaduanModel::where('status', 'pending')->get();

        $pengaduanTanggapan = PengaduanModel::whereIn('status', ['diverifikasi', 'ditolak'])
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        return view('petugas.pengaduan.pengaduan', compact('pengaduanPending', 'pengaduanTanggapan'));
    }
    public function destroy($id_pengaduan)
    {
        $pengaduan = PengaduanModel::findOrFail($id_pengaduan);
        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus');
    }

    public function cetakPdf($id_pengaduan)
    {
        $pengaduan = PengaduanModel::findOrFail($id_pengaduan);

        $fotoBase64 = null;
        if ($pengaduan->foto) {
            $fotoPath = storage_path('app/public/pengaduan/' . $pengaduan->foto);
            $fotoBase64 = base64_encode(file_get_contents($fotoPath));
        }

        $pdf = FacadePdf::loadView('petugas.pengaduan_pdf', compact('pengaduan', 'fotoBase64'));

        return $pdf->stream('pengaduan-' . $id_pengaduan . '.pdf');
    }
}
