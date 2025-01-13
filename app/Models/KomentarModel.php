<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;

    protected $table = 'tabel_komentar';
    protected $primaryKey = 'id_komentar';
    protected $fillable = [
        'id_forum',
        'id_masyarakat',
        'id_petugas',
        'isi_komentar',
    ];

    public function forumYangDikomentari()
    {
        return $this->belongsTo(ForumModel::class, 'id_forum');
    }

    public function masyarakatYangMengomentari()
    {
        return $this->belongsTo(MasyarakatModel::class, 'id_masyarakat');
    }

    public function petugasYangMengomentari()
    {
        return $this->belongsTo(PetugasModel::class, 'id_petugas');
    }

    public function komentarInduk()
    {
        return $this->belongsTo(KomentarModel::class, 'parent_id');
    }

    public function balasanKomentar()
    {
        return $this->hasMany(KomentarModel::class, 'parent_id');
    }
}
