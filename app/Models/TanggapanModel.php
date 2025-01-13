<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggapanModel extends Model
{
    use HasFactory;

    protected $table = 'tabel_tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        'id_pengaduan',
        'id_petugas',
        'isi_tanggapan',
    ];

    public function pengaduanYangDitanggapi()
    {
        return $this->belongsTo(PengaduanModel::class, 'id_pengaduan');
    }

    public function petugasYangMenanggapi()
    {
        return $this->belongsTo(PetugasModel::class, 'id_petugas');
    }
}
