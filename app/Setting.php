<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = "id_gelombang";
    protected $table = "gelombang";
    protected $guarded = [];
}
