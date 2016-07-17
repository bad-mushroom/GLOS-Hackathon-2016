<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dashboard;

class Dashboards extends \App\Http\Controllers\Controller
{
    public $dashboard;

    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function index()
    {
        return $this->dashboard->orderBy('name')->get();
    }

    public function show($name)
    {
        return $this->dashboard::where('name', $name)->first();
    }
}
