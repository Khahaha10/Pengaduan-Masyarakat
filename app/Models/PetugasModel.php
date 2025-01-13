<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PetugasModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'tabel_petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
        'nama_petugas',
        'email',
        'password',
        'telp',
        'role',
        'foto_profil',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function pengaduanYangDiverifikasi()
    {
        return $this->hasMany(PengaduanModel::class, 'id_petugas');
    }

    public function komentarYangDibuat()
    {
        return $this->hasMany(KomentarModel::class, 'id_petugas');
    }
}
