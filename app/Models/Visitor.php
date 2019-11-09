<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $table = 'visitors';
  protected $fillable = ['url', 'ip', 'hits', 'meta'];

  public function log()
  {
  	$ip = request()->ip();
  	$url = url()->full();

  	$visitor = $this->where(['ip' => $ip, 'url' => $url])->first();

  	if($visitor) {
  		$visitor->hits += 1;
  		$visitor->update();
  	} else {
  		$this->ip = $ip;
  		$this->url = $url;
  		$this->save();
  	}
  }
}
