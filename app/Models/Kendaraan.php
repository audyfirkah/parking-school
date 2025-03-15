<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $primaryKey = 'id_kendaraan'; // Sesuai dengan struktur tabel

    protected $fillable = [
        'id_user',
        'plat_nomor',
        'tipe',
        'no_stnk'
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function catatans()
{
    return $this->hasMany(Catatan::class, 'id_kendaraan', 'id_kendaraan');
}

    
}




