<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model 
{
    use HasFactory; 

    protected $table = 'kelas'; 
    protected $primaryKey = 'id_kelas'; 
    public $incrementing = true; 

    protected $fillable = [
        'nama_kelas', 
    ];
    public $timestamps = false;

    public function guru()
    {

        return $this->belongsToMany(GuruModel::class, 'guru_kelas', 'kelas_id', 'guru_id');
    }
}