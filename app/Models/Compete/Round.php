<?php

namespace App\Models\Compete;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
	protected $table = 'cpt_rounds';
	protected $fillable = ['title', 'p1', 'no_of_ques', 'marks_per_ques', 'invite_code'];

  public function details()
  {
  	return $this->hasMany('App\Models\Compete\RoundDetail', 'round_id');
  }
}