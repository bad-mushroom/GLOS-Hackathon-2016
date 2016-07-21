<?php

namespace App\Http\Controllers\Dev;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buoy;

class Buoys extends \App\Http\Controllers\Controller
{
    public $buoy;

    public function __construct(Buoy $buoy)
    {
        $this->buoy = $buoy;
    }

    public function index()
    {
        return $this->buoy->orderBy('lastDataUpdate', 'desc')->get();
    }
	
	public function map()
	{
		return view('dev.map');
	}

}
