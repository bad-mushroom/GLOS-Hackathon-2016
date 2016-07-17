<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
	public $timestamps = false;
	public $table = 'dashboards';

	protected $guarded = ['id'];
}
