<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualización de novedades de tiquetes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle():int
    {
        return 0;
    }
}
