<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mProposal extends Model
{
    protected $table = "kegiatan";
    protected $primaryKey = "idkegiatan";
    public $timestamps = false;

    public function mUKM(){
    	return $this->hasOne("App\Models\mUkm",'idukm','idukm');
    }
}
