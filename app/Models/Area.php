<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
     protected $primaryKey = 'id_area'; // Sesuai dengan struktur tabel

    protected $fillable = [
        'nama',
        'kapasitas',
    ];

    public function catatans()
{
    return $this->hasMany(Catatan::class, 'id_area', 'id_area');
}

}
