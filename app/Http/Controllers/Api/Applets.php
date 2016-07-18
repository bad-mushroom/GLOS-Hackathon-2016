<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Applet;
use App\Buoy;

class Applets extends \App\Http\Controllers\Controller
{
	public $defaultLocation = '-83.7430, 42.2808'; // Made with ❤️ in Ann Arbor
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
			//return response('Missing location', 422);
		}
		// 1 mile is 1609.34 meters
		$test = Buoy::Distance(50 * 1609.34, $this->defaultLocation)->get();
		dd($test);
		return $this->applet->with('filters')->where('shortname', $name)->first();
	}
}
