<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 9:07 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mPengurus extends Model
{
    protected $table = 'pengurus';
    protected $primaryKey = 'idpengurus';
    public $timestamps = false;
    public function mAnggota()
    {
        return $this->hasOne('App\Models\mAnggota', 'idAnggota', 'idAnggota');

    }
    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');

    }
}