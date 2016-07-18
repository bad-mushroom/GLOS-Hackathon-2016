<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateBuoy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buoys:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update list of buoys from GLOS API';

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
        $response = $client->request('GET', 'http://data.glos.us/glos_obs/platform.glos?tid=15', []);

        if ($response->getStatusCode() !== 200) {
            return $this->error("Server responded with {$response->getStatusCode()}");
        }

        // The GLOS API returns text/plain, need to JSON'fy it.
        foreach (json_decode($response->getBody()) as $buoyUpdate) { 
            $buoy = \App\Buoy::firstOrNew(['buoyId' => $buoyUpdate->id]);
            $buoy->location = $buoyUpdate->lon . ',' . $buoyUpdate->lat; // flipped for calculation (instead of lat,lon)
            $buoy->lastDataUpdate = $buoyUpdate->lastDataUpdate;
            $buoy->zValue = $buoyUpdate->zvalue;
            $buoy->shortName = $buoyUpdate->shortName;
            $buoy->longName = $buoyUpdate->longName;
            $buoy->stationUrl = $buoyUpdate->stationUrl;
            $buoy->state = $buoyUpdate->state;
            $buoy->ndbcHandler = $buoyUpdate->ndbcHandler;
            $buoy->imageUrl = $buoyUpdate->imgUrl;
            $buoy->description = $buoyUpdate->description;
            $buoy->active = $buoyUpdate->active;
            $buoy->save();
        }
    }
}
