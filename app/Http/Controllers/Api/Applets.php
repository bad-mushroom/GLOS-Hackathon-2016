<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Applet;

class Applets extends \App\Http\ControllersController
{
    protected $applet;
    
    public function __construct(Applet $applet)
    {
        $this->applet = $applet;
    }
    
    public function index()
    {
        return $this->applet->orderBy('shortname')->get();
    }
    
    public function show($name)
    {
        return $this->applet->where('shortname', $name)->first();
    }
}
