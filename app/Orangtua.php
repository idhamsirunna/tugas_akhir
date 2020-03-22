<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Detail_Siswa;

class Orangtua extends Model
{
    protected $table = "detail_ortu";
    protected $primaryKey = "id_ortu";
    // protected $fillable = [
    //     'nama_ayah', 'nama_ibu', 'alamat_ayah', 'alamat_ibu', 'telp_ayah', 'telp_ibu', 'pendidikan_ayah', 'pendidikan_ibu', 'penghasilan_ayah', 'penghasilan_ibu', 'id_siswa', 'pekerjaan_ayah', 'pekerjaan_ibu'
    // ];

    protected $guarded = [];

    public function detail_siswa()
    {
        return $this->hasOne(Detail_Siswa::class, 'id_ortu', 'id_ortu');
    }
}
