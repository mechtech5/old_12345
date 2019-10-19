<?php

namespace App\Models\Compete;

use Illuminate\Database\Eloquent\Model;

class RoundDetail extends Model
{
  protected $table = 'cpt_round_details';
  protected $fillable = ['round_id', 'question', 'asker_id'];
}