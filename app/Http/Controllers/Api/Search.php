<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Filter;

class Search extends \App\Http\Controllers\Controller
{
	public function show($name)
	{
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET', 
            'https://maps.googleapis.com/maps/api/geocode/json?address=' . $name . '&key=' . env('KEY_GOOGLE_GEOCODE'), 
            []
        );

        if ($response->getStatusCode() !== 200) {
            return $this->error("Server responded with {$response->getStatusCode()}");
        }

		return $response->getBody();
	}
}
