<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\KomentarModel;

class MsKomentarController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'id_forum' => 'required|exists:tabel_forum,id_forum',
            'isi_komentar' => 'required|string',
        ]);

        KomentarModel::create([
            'id_forum' => $request->id_forum,
            'id_masyarakat' => Auth::id(),
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function update(Request $request, $id_komentar)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
        ]);

        $comment = KomentarModel::findOrFail($id_komentar);

        if ($comment->id_masyarakat != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }

        $comment->update([
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    public function destroy($id_komentar)
    {
        $comment = KomentarModel::findOrFail($id_komentar);

        if ($comment->id_masyarakat != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

}
