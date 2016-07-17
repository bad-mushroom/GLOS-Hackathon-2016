<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	public $timestamps = false;
	public $table = 'filters';

	protected $guarded = ['id'];
	
	public function applets()
	{
		return $this->belongsToMany('App\Applet', 'applets_filters');
	}
}
