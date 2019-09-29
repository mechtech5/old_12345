<?php

namespace App\Models\Social;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'social_posts';
	protected $fillable = ['user_id', 'title', 'body', 'media'];

	public function user()
  {
    return $this->belongsTo('App\User');
  }

	public function comments()
  {
    return $this->hasMany('App\Social\Comment');
  }
}
