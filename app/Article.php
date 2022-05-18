<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{


  public function users()
  {
    return $this->belongsToMany('App\User')
      ->withPivot('comment');
  }
}
