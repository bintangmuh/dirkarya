<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = "karya";

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

}