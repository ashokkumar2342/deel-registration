<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TmpUploadProperty extends Model
{
      
      protected $fillable=['id'];
      protected $table='tmp_upload_property';
      public $timestamps=false; 
      public function Districts()
      {
             return $this->hasOne('App\Model\District','id','district_id');
      }
       
}