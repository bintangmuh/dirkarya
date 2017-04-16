<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected $table = 'gallery';

    public function karya() {
      return $this->belongsTo('App\Karya', 'karya_id');
    }

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }
}
