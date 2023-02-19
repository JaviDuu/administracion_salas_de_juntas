<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $roomController = new RoomController();
            $roomController->makeRoomsAvailable();
        })->everyMinute();
        //$schedule->command('schedule:run')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
