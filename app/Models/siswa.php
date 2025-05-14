<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'NISN', 
        'nama', 
        'alamat', 
        'nohp', 
        'JK', 
        'username', 
        'password', 
        'user_id', 
        'lokal_id'
    ];
    public function lokal()
    {
        return $this->belongsTo(Lokal::class, 'lokal_id');
    }
}
