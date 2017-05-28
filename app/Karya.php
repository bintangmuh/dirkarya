<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = "karya";

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function images() {
      return $this->hasMany('App\Galleries', 'karya_id', 'id');
    }

    public function videos() {
      return $this->hasMany('App\Video', 'karya_id', 'id');
    }
}
