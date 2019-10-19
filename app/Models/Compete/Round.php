<?php

namespace App\Models\Compete;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
	protected $table = 'cpt_rounds';
	protected $fillable = ['title', 'no_of_ques', 'marks_per_ques'];

  public function details()
  {
  	return $this->hasMany('App\Models\Compete\RoundDetail', 'round_id');
  }
}