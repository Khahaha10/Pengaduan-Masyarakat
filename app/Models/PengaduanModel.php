<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    use HasFactory;

    protected $table = 'tabel_pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'id_masyarakat',
        'judul_pengaduan',
        'isi_pengaduan',
        'foto',
        'status',
    ];

    public function masyarakatYangMembuat()
    {
        return $this->belongsTo(MasyarakatModel::class, 'id_masyarakat');
    }

    public function petugasYangMemverifikasi()
    {
        return $this->belongsTo(PetugasModel::class, 'id_petugas');
    }

    public function tanggapan()
    {
        return $this->hasMany(TanggapanModel::class, 'id_pengaduan');
    }
}
