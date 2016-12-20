<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengunjung extends Model
{
    use SoftDeletes;
	protected $fillable = [
		'qty',
	];
	protected $dates = [
		'deleted_at',
	];
}
