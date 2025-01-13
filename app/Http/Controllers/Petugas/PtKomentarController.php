<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\KomentarModel;

class PtKomentarController extends Controller
{
    public function destroy($id_komentar)
    {
        $comment = KomentarModel::findOrFail($id_komentar);

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
