<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $primaryKey = 'id_jurusan'; // Sesuaikan dengan nama kolom primary key di tabel


    protected $fillable = ['nama'];

}
