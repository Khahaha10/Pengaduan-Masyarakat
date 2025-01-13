<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Petugas\PtPetugasController;
use App\Http\Controllers\Petugas\PtAkunPetugasController;
use App\Http\Controllers\Petugas\PtPengaduanController;
use App\Http\Controllers\Petugas\PtTanggapanController;
use App\Http\Controllers\Petugas\PtForumController;
use App\Http\Controllers\Petugas\PtKomentarController;
use App\Http\Controllers\Petugas\PtMasyarakatController;

use App\Http\Controllers\Masyarakat\MsPengaduanController;
use App\Http\Controllers\Masyarakat\MsMasyarakatController;
use App\Http\Controllers\Masyarakat\MsForumController;
use App\Http\Controllers\Masyarakat\MsHomeController;
use App\Http\Controllers\Masyarakat\MsKomentarController;
use App\Http\Controllers\Petugas\PtHomeController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/masyarakat/home', function () {
    return view('masyarakat.home');
})->name('masyarakat.home')->middleware('auth:masyarakat');


Route::middleware(['auth:masyarakat'])->group(function () {
    Route::get('/masyarakat/home', [MsHomeController::class, 'index'])->name('masyarakat.home');
    Route::post('/masyarakat/masyarakat/update/{id}', [MsMasyarakatController::class, 'update'])->name('masyarakat.masyarakat.update');

    Route::get('/masyarakat/pengaduan', [MsPengaduanController::class, 'index'])->name('masyarakat.pengaduan.index');
    Route::get('/masyarakat/pengaduan/create', [MsPengaduanController::class, 'create'])->name('masyarakat.pengaduan.create');
    Route::post('/masyarakat/pengaduan', [MsPengaduanController::class, 'store'])->name('masyarakat.pengaduan.store');
    Route::get('/masyarakat/pengaduan/{id}', [MsPengaduanController::class, 'show'])->name('masyarakat.pengaduan.show');
    Route::get('/masyarakat/pengaduan/{id}/edit', [MsPengaduanController::class, 'edit'])->name('masyarakat.pengaduan.edit');
    Route::put('/masyarakat/pengaduan/{id}', [MsPengaduanController::class, 'update'])->name('masyarakat.pengaduan.update');
    Route::delete('/masyarakat/pengaduan/{id}', [MsPengaduanController::class, 'destroy'])->name('masyarakat.pengaduan.destroy');

    Route::get('/masyarakat/forum', [MsForumController::class, 'index'])->name('masyarakat.forum.index');
    Route::post('/masyarakat/forum/store', [MsForumController::class, 'store'])->name('masyarakat.forum.store');
    Route::put('/masyarakat/forum/{id_forum}', [MsForumController::class, 'update'])->name('masyarakat.forum.update');
    Route::delete('/masyarakat/forum/{id_forum}', [MsForumController::class, 'destroy'])->name('masyarakat.forum.destroy');

    Route::put('/masyarakat/komentar/{id_komentar}', [MsKomentarController::class, 'update'])->name('masyarakat.komentar.update');
    Route::delete('/masyarakat/komentar/{id_komentar}', [MsKomentarController::class, 'destroy'])->name('masyarakat.komentar.destroy');

    Route::post('/masyarakat/komentar/store', [MsKomentarController::class, 'store'])->name('masyarakat.komentar.store');

});

Route::middleware(['auth:petugas'])->group(function () {
    Route::get('/petugas/home', [PtHomeController::class, 'index'])->name('petugas.home');
    Route::put('/petugas/petugas/update/{id}', [PtPetugasController::class, 'update'])->name('petugas.petugas.update');

    Route::get('/petugas/forum', [PtForumController::class, 'index'])->name('petugas.forum.index');
    Route::delete('/petugas/forum/{id_forum}', [PtForumController::class, 'destroy'])->name('petugas.forum.destroy');
    Route::delete('/petugas/komentar/{id_komentar}', [PtKomentarController::class, 'destroy'])->name('petugas.komentar.destroy');

    Route::get('/petugas/pengaduan', [PtPengaduanController::class, 'index'])->name('petugas.pengaduan.index');
    Route::put('/petugas/pengaduan/{id_pengaduan}/tanggapan/{id_tanggapan}', [PtTanggapanController::class, 'update'])->name('petugas.tanggapan.update');
    Route::post('/petugas//tanggapan/{id_pengaduan}', [PtTanggapanController::class, 'store'])->name('petugas.tanggapan.store');
    Route::delete('/petugas/pengaduan/{id_pengaduan}', [PtPengaduanController::class, 'destroy'])->name('petugas.pengaduan.destroy');

    Route::get('/petugas/masyarakat', [PtMasyarakatController::class, 'index'])->name('petugas.masyarakat.index');
    Route::post('/petugas/masyarakat/store', [PtMasyarakatController::class, 'store'])->name('petugas.masyarakat.store');
    Route::delete('/petugas/masyarakat/{id}', [PtMasyarakatController::class, 'destroy'])->name('petugas.masyarakat.destroy');
    Route::post('/petugas/masyarakat/update/{id}', [PtMasyarakatController::class, 'update'])->name('petugas.masyarakat.update');

    Route::get('/petugas/petugas', [PtAkunPetugasController::class, 'index'])->name('petugas.petugas.index');
    Route::post('/petugas/petugas/store', [PtAkunPetugasController::class, 'store'])->name('petugas.petugas.store');
    Route::delete('/petugas/petugas/{id}', [PtAkunPetugasController::class, 'destroy'])->name('petugas.petugas.destroy');
    Route::put('/petugas/petugas/{id}', [PtAkunPetugasController::class, 'update'])->name('petugas.petugas.update');

    Route::get('petugas/pengaduan/cetak/{id_pengaduan}', [PtPengaduanController::class, 'cetakPdf'])->name('petugas.pengaduan.cetak');
});


