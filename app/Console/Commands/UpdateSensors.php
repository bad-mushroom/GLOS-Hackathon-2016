<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Buoy;
use App\Sensor;

class UpdateSensors extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'buoys:updateSensors';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update availble buoys\' sensors';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$client = new \GuzzleHttp\Client();
		
		foreach (Buoy::Active()->get() as $buoy) {
			$response = $client->request('GET', 'http://data.glos.us/glos_obs/sensor.glos?pid=' . $buoy->buoyId, []);
			foreach (json_decode($response->getBody()) as $sensorData) { 
				$sensor = Sensor::firstOrNew(['sensor_id' => $sensorData->id]);
				$sensor->buoy_id = $sensorData->pltId;
				$sensor->shortName = $sensorData->shortName;
				$sensor->name = $sensorData->measureType->obsTypeName;
				$sensor->description = $sensorData->measureType->obsTypeDef;
				$sensor->measurement = $sensorData->measureType->uomDef;
				$sensor->save();
			}
		}
	}
}
