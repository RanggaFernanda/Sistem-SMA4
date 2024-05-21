<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembina extends Model
{
    use HasFactory;
    protected $table = "datapembinas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_pembina', 'nip_pembina', 'email_pembina', 'tugas_pembina', 'jeniskelamin_pembina', 'ekstrakulikuler_pembina'
    ];
        public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
