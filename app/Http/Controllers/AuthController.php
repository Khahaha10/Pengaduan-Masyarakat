<?php

namespace App\Http\Controllers;

use App\Models\MasyarakatModel;
use App\Models\PetugasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:tabel_masyarakat',
            'nama_masyarakat' => 'required',
            'email' => 'required|email|unique:tabel_masyarakat',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $masyarakat = MasyarakatModel::create([
            'nik' => $request->nik,
            'nama_masyarakat' => $request->nama_masyarakat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Registrasi berhasil!');
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Email dan password wajib diisi!');
        }

        if (Auth::guard('masyarakat')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $masyarakat = Auth::guard('masyarakat')->user();
            return redirect()->route('masyarakat.home')->with('success', 'Login berhasil!');
        }

        if (Auth::guard('petugas')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $petugas = Auth::guard('petugas')->user();
            return redirect()->route('petugas.home')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/login');
    }
}
