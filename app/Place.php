<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function guide(){
      return  $this->hasMany('App\Guide');
    }
}
