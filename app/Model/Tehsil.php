<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
	
   protected $fillable=[
   	'id',];
   	public $timestamps = false;

   	public function district()
    {
      	 return $this->hasOne('App\Model\District','id','district_id');
    }
}
