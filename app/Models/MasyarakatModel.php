<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MasyarakatModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'tabel_masyarakat';
    protected $primaryKey = 'id_masyarakat';
    protected $fillable = [
        'nik',
        'nama_masyarakat',
        'email',
        'password',
        'telp',
        'foto_profil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pengaduanYangDibuat()
    {
        return $this->hasMany(PengaduanModel::class, 'id_masyarakat');
    }

    public function komentarYangDibuat()
    {
        return $this->hasMany(KomentarModel::class, 'id_masyarakat');
    }
}
