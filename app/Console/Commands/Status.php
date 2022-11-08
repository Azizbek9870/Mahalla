<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Status extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a status for people';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $status = new \App\Models\Status();
        $status['status'] = $name;
        $status->save();
        $this->info("Status created successfully! Status: ".$name);
    }
}
