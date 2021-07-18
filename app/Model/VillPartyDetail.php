<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VillPartyDetail extends Model
{
      
      protected $fillable=['id','village_id','party_type'];
      protected $table='vill_party_detail';
      public $timestamps=false; 

      public function Relation($value='')
      {
      	return $this->hasOne('App\Model\Relation','id','relation_id');
      }
      
       
}