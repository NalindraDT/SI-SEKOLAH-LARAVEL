<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruModel extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
    'nama_guru',
    'nip'
    ];
        public $timestamps = false;
        public function kelas()
    {
        return $this->belongsToMany(KelasModel::class, 'guru_kelas', 'guru_id', 'kelas_id');
    }
}
