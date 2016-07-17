<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Filter;

class Filters extends \App\Http\Controllers\Controller
{
    public $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    public function index()
    {
        return $this->filter->orderBy('shortname')->get();
    }

    public function show($name)
    {
        return $this->filter::where('shortname', $name)->first();
    }
}
