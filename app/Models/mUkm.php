<?php
/**
 * Created by PhpStorm.
 * User: Bustommy
 * Date: 6/22/2016
 * Time: 1:11 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class mUkm extends Model
{
    protected $table = 'ukm';
    protected $primaryKey = 'idukm';
    public $timestamps = false;

    public function dukm()
    {
        return $this->hasMany('App\Models\mAnggota', 'idAnggota', 'idukm');
    }
}