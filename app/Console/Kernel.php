<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Definir los comandos que se registrarán.
     */
    protected $commands = [
        \App\Console\Commands\UpdateRestaurantList::class,
    ];

    /**
     * Definir el programa de tareas que se ejecutarán automáticamente.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ejecutar el comando 'restaurants:update-list' diariamente
        $schedule->command('restaurants:update-list')->daily();
    }

    /**
     * Registrar los comandos de la aplicación.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
