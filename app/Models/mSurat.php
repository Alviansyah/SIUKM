<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/24/2016
 * Time: 11:58 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mSurat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'idSurat';
    public $timestamps = false;
    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');

    }
}