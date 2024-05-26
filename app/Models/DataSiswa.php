<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;
    protected $table = "datasiswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_siswa', 'nisn_siswa', 'kelas_siswa', 'email_siswa', 'jeniskelamin_siswa','id_ekskul', 'nilai_siswa','status', 'validasi'
    ];
        public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}

