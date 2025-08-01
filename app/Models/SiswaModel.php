<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiswaModel extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = 
    [
        'id_kelas',
        'nama_siswa',
        'nis'
    ];
    public $timestamps = false;
    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'id_kelas', 'id_kelas');
    }
    
}
