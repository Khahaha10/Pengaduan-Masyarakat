<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumModel;
use App\Models\KomentarModel;
use App\Models\PengaduanModel;
use Illuminate\Support\Facades\Auth;

class PtForumController extends Controller
{
    public function index()
    {
        $forums = ForumModel::with('masyarakatYangMembuat', 'komentarPadaForum.masyarakatYangMengomentari')->get();
        
        $pengaduanTanggapan = PengaduanModel::whereIn('status', ['diverifikasi', 'ditolak'])
                                        ->orderBy('updated_at', 'desc') 
                                        ->get();

        $pengaduan = PengaduanModel::with('masyarakatYangMembuat')->get();

        return view('petugas.forum.forum', compact('forums', 'pengaduan', 'pengaduanTanggapan'));
    }

    public function destroy($id_forum)
    {
        $forum = ForumModel::findOrFail($id_forum);

        $forum->delete();

        return redirect()->back()->with('success', 'Forum berhasil dihapus.');
    }
    
}
