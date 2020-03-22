<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Siswa extends Model
{

    protected $table = 'detail_siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'id_siswa', 'id_user', 'id_ortu', 'no_daftar', 'nisn', 'nik', 'jenis_kel', 'tempat_lahir', 'tgl_lahir', 'alamat_rumah', 'agama', 'kewarganegaraan', 'asal_sekolah', 'alamat_sekolah', 'bahasa_rumah', 'anak_ke', 'jumlah_saudara', 'golongan_darah', 'jurusan'
    ];

    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_ortu', 'id_ortu');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // public function payment()
    // {
    //     return $this->hasMany(Payments::class, 'payment_id')
    // }
}
