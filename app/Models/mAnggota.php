<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 1:07 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mAnggota extends Model
{
    protected $table = 'anggotaukm';
    protected $primaryKey = 'idAnggota';
    public $timestamps = false;

    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');
        
    }
    public function mPengurus()
    {
        return $this->hasOne('App\Models\mPengurus', 'idAnggota', 'idAnggota');

    }

    public function mUser()
    {
        return $this->hasOne('App\Models\mUser', 'username', 'username');

    }

}