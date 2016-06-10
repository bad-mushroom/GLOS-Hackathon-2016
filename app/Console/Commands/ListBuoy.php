<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListBuoy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buoys:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all known buoys';

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
        $this->table([], \App\Buoy::all());
    }
}
