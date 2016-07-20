<?php

namespace App\Traits\Models;

trait Locatable 
{
	/**
	 * [scopeDistance description]
	 * @param  [type] $query    [description]
	 * @param  float $dist     degrees
	 * @param  [type] $location [description]
	 * @return [type]           [description]
	 */
	public function scopeDistance($query, $dist, $location)
	{
		return $query->whereRaw('st_distance_sphere(location, POINT(' . $location . ')) < ' . $dist );
	}
	
	// --- MySQL POINT Support
	
	public function setLocationAttribute($value) 
	{
		$this->attributes['location'] = \DB::raw("POINT($value)");
	}
 
	public function getLocationAttribute($value)
	{
		$loc =  substr($value, 6);
		$loc = preg_replace('/[ ,]+/', ',', $loc, 1);
 
		return substr($loc,0,-1);
	}
 
	public function newQuery($excludeDeleted = true)
	{
		$raw = '';
		foreach($this->geofields as $column){
			$raw .= ' astext(' . $column . ') as ' . $column . ' ';
		}
 
		return parent::newQuery($excludeDeleted)->addSelect('*', \DB::raw($raw));
	}
}
