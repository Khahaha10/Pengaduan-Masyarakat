<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ForumModel;
use App\Models\PengaduanModel;

class MsForumController extends Controller
{
    public function index()
    {
        $masyarakat = Auth::user(); 

        $pengaduan = PengaduanModel::where('id_masyarakat', $masyarakat->id_masyarakat)
                                    ->with('masyarakatYangMembuat') 
                                    ->orderBy('created_at', 'desc') 
                                    ->get();


        $forums = ForumModel::with(['masyarakatYangMembuat', 'komentarPadaForum.balasanKomentar'])->latest()->get();

        return view('masyarakat.forum.forum', compact('forums', 'pengaduan', 'masyarakat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_forum' => 'required|string',
        ]);

        ForumModel::create([
            'id_masyarakat' => Auth::id(),
            'judul' => $request->judul,
            'isi_forum' => $request->isi_forum,
        ]);

        return redirect()->back()->with('success', 'Forum berhasil dibuat.');
    }

    public function edit($id_forum)
    {
        $forum = ForumModel::findOrFail($id_forum);

        if ($forum->id_masyarakat != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this forum.');
        }

        return view('masyarakat.forum.edit', compact('forum'));
    }

    public function update(Request $request, $id_forum)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_forum' => 'required|string',
        ]);

        $forum = ForumModel::findOrFail($id_forum);

        if ($forum->id_masyarakat != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak berwengang untuk mengedit forum ini.');
        }

        $forum->update([
            'judul' => $request->judul,
            'isi_forum' => $request->isi_forum,
        ]);

        return redirect()->back()->with('success', 'Forum berhasil diperbarui.');
    }

    public function destroy($id_forum)
    {
        $forum = ForumModel::findOrFail($id_forum);

        if ($forum->id_masyarakat != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak berwengang untuk menghapus forum ini.');
        }

        $forum->delete();

        return redirect()->back()->with('success', 'Forum berhasil dihapus.');
    }
}
