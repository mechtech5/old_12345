<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $table = 'todos';
	protected $guarded = [];
	use SoftDeletes;

	protected $dates = ['deleted_at'];
}