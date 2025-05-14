<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $fillable = [
       'siswa_id',
    'guru_id',
    'tanggal',
    'jam_masuk',
    'jam_pulang',
    'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
