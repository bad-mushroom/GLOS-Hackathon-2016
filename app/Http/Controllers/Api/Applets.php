<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Applet;

class Applets extends \App\Http\Controllers\Controller
{
    protected $applet;
    
    public function __construct(Applet $applet)
    {
        $this->applet = $applet;
    }
    
    public function index()
    {
        return $this->applet->with('filters')->orderBy('shortname')->get();
    }
    
    public function show($name)
    {
        return $this->applet->with('filters')->where('shortname', $name)->first();
    }
}
