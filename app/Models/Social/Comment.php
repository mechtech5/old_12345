<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'social_posts';
	protected $fillable = ['user_id', 'post_id', 'body', 'media'];

	public function post()
  {
    return $this->belongsTo('App\Social\Post');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}