<?php

namespace Acme\MyStats\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\LoggingCommand;

class ClearCommand extends LoggingCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my_stats:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear stats';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // do something here

        return Command::SUCCESS;
    }
}

