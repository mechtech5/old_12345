<?php

namespace App\Models;

use Carbon\Carbon;
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
  		if($visitor->updated_at < Carbon::now()->subMinutes(60)->toDateTimeString())
  		{
  			$visitor->hits += 1;
  			$visitor->update();
  		}
  	} else {
  		$this->ip = $ip;
  		$this->url = $url;
  		$this->save();
  	}
	}
}
