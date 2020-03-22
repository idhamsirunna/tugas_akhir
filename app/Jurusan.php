<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jenjang;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';

    public function jenjang()
    {
        return $this->belongsToMany(Jenjang::class, 'id_jenjang', 'id_jenjang');
    }
}
