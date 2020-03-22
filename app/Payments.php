<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = "payment";
    protected $primaryKey = "id_payment";
    // public function siswa()
    // {
    //     return $this->belongsTo(Detail_Siswa::class, 'payment_id');
    // }

    // public function payment_detail()
    // {
    //     return $this->hasMany(PaymenDetail::class, 'payment_id');
    // }


}
