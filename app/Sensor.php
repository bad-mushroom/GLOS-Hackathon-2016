<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	public $guarded = ['id'];
	protected $table = 'sensors';
}
