<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'no_telp', 'password', 'role_id'
    ];

    protected $attributes = [
        'bayar_pendaftaran' => 0,
        'sudah_cetak' => 0,
        'is_lulus' => 0,
        'is_completed' => 0,
        'photo' => "default.jpg",
    ];

    protected $primaryKey = "id_user";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail_siswa()
    {
        return $this->hasOne(Detail_Siswa::class, 'id_user', 'id_user');
    }
}
