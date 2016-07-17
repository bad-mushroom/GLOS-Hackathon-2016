<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applet extends Model
{
	public $timestamps = false;
	public $table = 'applets';

	protected $guarded = ['id'];
	
	public function filters()
	{
		return $this->belongsToMany('App\Filter', 'applets_filters');
	}
}
