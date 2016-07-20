<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Applet;
use App\Buoy;

class Applets extends \App\Http\Controllers\Controller
{
	public $defaultLocation = '42.2808,-83.7430'; // Made with ❤️ in Ann Arbor
	protected $applet;

	public function __construct(Applet $applet)
	{
		$this->applet = $applet;
	}
	
	public function index()
	{
		return $this->applet->with('filters')->orderBy('shortname')->get();
	}

	public function show($name, $location = null)
	{
		if (!$location) {
			$location = $this->defaultLocation;
		}

		// Latitude, Longitude needs to be swapped around for calculation
		$l = explode(',', $location);
		$location = $l[1] . ',' . $l[0];

		// Range is the distance data is valid for
		$range = ($this->applet->distance_range) ? $this->applet->distance_range : Buoy::DEFAULT_DISTANCE_RANGE;

		// 1 mile is 1609.34 meters
		$buoy = Buoy::Distance($range * 1609.34, $location)->with(['sensors' => function($query) use ($name) {
			$query->where('shortName', '=', $name);
		}])->first(); 

		if ($buoy) {
			$client = new \GuzzleHttp\Client();
			$response = $client->request('GET', 'http://data.glos.us/glos_obs/obs.glos?sids=' . $buoy->sensors[0]->sensor_id . '&pt=15&pid=' . $buoy->buoyId . '&hours=1', []);

			if ($response->getStatusCode() !== 200) {
				return $this->error("Server responded with {$response->getStatusCode()}");
			}
			
			return $response->getBody();
		}

		return $this->applet->with('filters')->where('shortname', $name)->first(); 
	}
}
