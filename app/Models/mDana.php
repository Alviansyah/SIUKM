<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 11:42 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mDana extends Model
{
    protected $table = 'anggarandana';
    protected $primaryKey = 'idanggaran';
    public $timestamps = false;
    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');

    }
}