<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class Jenjang extends Model
{
    protected $table = 'jenjang';
    protected $primaryKey = 'id_jenjang';

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'id_jenjang', 'id_jenjang');
    }
}
