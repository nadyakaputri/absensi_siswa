<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    //
    
    use HasFactory;

    // protected $table = 'guru'; // Nama tabel di database
    protected $fillable = [
        'NIP', 
        'nama', 
        'alamat', 
        'nohp', 
        'JK', 
        'username', 
        'password', 
        'user_id'
    ]; // Kolom yang dapat diisi

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke tabel `absens`.
     * Guru dapat memiliki banyak absensi.
     */
    public function absens()
    {
        return $this->hasMany(absen::class, 'guru_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}

