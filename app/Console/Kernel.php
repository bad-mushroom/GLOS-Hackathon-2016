<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		Commands\UpdateBuoy::class,
		Commands\UpdateSensors::class,
		Commands\ListBuoy::class
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		// Run the task daily at 1:00 & 13:00
		$schedule->command('buoys:update')->twiceDaily(1, 13)->withoutOverlapping();

		// $schedule->command('buoys:sensorsUpdate')->onceMonthly(1, 13)->withoutOverlapping();
	}
}
