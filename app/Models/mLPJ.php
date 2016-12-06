<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mLPJ extends Model
{
		protected $table = 'lpj';
		protected $primaryKey = 'idlpj';
		public $timestamps = false;
    
    public function mUKM()
    {
        return $this->hasOne('App\Models\mUkm', 'idukm', 'idukm');
    }
}
