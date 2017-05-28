<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['youtube_url', 'user_id', 'karya_id'];
    public function karya() {
      return $this->belongsTo('App\Karya');
    }
}
