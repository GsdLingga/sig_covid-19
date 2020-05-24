<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKabupaten extends Model
{
    protected $table = 'tb_data';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
