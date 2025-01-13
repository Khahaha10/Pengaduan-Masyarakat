<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;
use App\Models\PetugasModel;
use Illuminate\Http\Request;

class PtHomeController extends Controller
{
    public function index()
    {
        $jumlahMasyarakat = MasyarakatModel::count();

        $jumlahPetugas = PetugasModel::where('role', 'petugas')->count();

        $jumlahPengaduan = PengaduanModel::count();

        $jumlahPengaduanTerverifikasi = PengaduanModel::where('status', 'diverifikasi')->count();

        $pengaduanTanggapan = PengaduanModel::whereIn('status', ['diverifikasi', 'ditolak'])
                                        ->orderBy('updated_at', 'desc') 
                                        ->get();

        return view('petugas.home', compact('jumlahMasyarakat', 'jumlahPetugas', 'jumlahPengaduan', 'jumlahPengaduanTerverifikasi', 'pengaduanTanggapan'));
    }
}
