<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mSPJ extends Model
{
    protected $table = 'spj';
    protected $primaryKey = 'idspj';
    public $timestamps = false;
    
    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');

    }
}