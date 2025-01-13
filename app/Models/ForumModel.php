<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    use HasFactory;

    protected $table = 'tabel_forum';
    protected $primaryKey = 'id_forum';
    protected $fillable = [
        'id_masyarakat',
        'judul',
        'isi_forum',
    ];

    public function masyarakatYangMembuat()
    {
        return $this->belongsTo(MasyarakatModel::class, 'id_masyarakat');
    }

    public function komentarPadaForum()
    {
        return $this->hasMany(KomentarModel::class, 'id_forum');
    }
}
