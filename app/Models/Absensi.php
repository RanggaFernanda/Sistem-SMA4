<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'id_siswa',
        // 'nama_siswa',
        'id_ekskul',
        'tanggal',
        'kehadiran',
        'pertemuan'
    ];

    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'nama_siswa');
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Dataekskul::class, 'ekskul');
    }
}
