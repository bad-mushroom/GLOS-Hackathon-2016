<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\Locatable;

class Buoy extends Model
{
	use Locatable;
	
	const DEFAULT_DISTANCE_RANGE = 50;

	public $guarded = ['id'];
	protected $table = 'buoys';
	protected $geofields = ['location'];

	public function sensors()
	{
		return $this->hasMany('App\Sensor', 'buoy_id', 'buoyId');
	}

	public function scopeActive($query)
	{
		return $query->where('active', 1);
	}
	
}
