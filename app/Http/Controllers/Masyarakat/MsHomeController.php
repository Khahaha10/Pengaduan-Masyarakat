<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsHomeController extends Controller
{
    public function index()
    {
        $masyarakat = Auth::user(); 

        $pengaduan = PengaduanModel::where('id_masyarakat', $masyarakat->id_masyarakat)
                                    ->with('masyarakatYangMembuat')
                                    ->orderBy('created_at', 'desc') 
                                    ->get();

        $jumlahPengaduan = PengaduanModel::count();

        $jumlahPengaduanUser = PengaduanModel::where('id_masyarakat', Auth::id())->count();

        $jumlahPengaduanDiverifikasi = PengaduanModel::where('id_masyarakat', Auth::id())
            ->where('status', 'diverifikasi')
            ->count();
            
        $jumlahPengaduanDitolak = PengaduanModel::where('id_masyarakat', Auth::id())
            ->where('status', 'ditolak')
            ->count();

        return view('masyarakat.home', compact(
            'jumlahPengaduan',
            'jumlahPengaduanUser',
            'jumlahPengaduanDiverifikasi',
            'jumlahPengaduanDitolak',
            'pengaduan'
        ));
    }
}
