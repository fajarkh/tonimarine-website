<?php

namespace Modules\Rfq\Console\Commands;

use Illuminate\Console\Command;

class RfqCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:RfqCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rfq Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
