<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarekskul extends Model
{
    use HasFactory;
    protected $table = "datasiswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_siswa', 'nisn_siswa','user_id', 'kelas_siswa', 'email_siswa', 'jeniskelamin_siswa','id_ekskul',
    ];
        public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function ekskul()
    {
        return $this->belongsTo(Dataekskul::class, 'id_ekskul', 'id');
    }

}
