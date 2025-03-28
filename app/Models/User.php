<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Sesuaikan dengan nama kolom primary key di tabel

    protected $fillable = [
    'nama',
    'kode',
    'id_jurusan',
    'email',
    'password',
    'role',
    'no_telp',
    'no_ktp',
];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function catatans()
{
    return $this->hasMany(Catatan::class, 'id_user', 'id_user');
}

}
