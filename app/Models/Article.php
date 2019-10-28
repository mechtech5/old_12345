<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends Model implements HasMedia
{
  use HasMediaTrait;
  
  protected $table = 'articles';
  protected $fillable = ['user_id', 'title', 'excerpt', 'slug', 'body'];

  public function comments()
  {
    return $this->morphMany('App\Models\Comment', 'commentable');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}