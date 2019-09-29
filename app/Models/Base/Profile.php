<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'user_profiles';

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
