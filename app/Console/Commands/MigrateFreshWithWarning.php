<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateFreshWithWarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fresh-warning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations with a warning about data loss';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->confirm('WARNING: This will delete ALL data in the database. Are you sure you want to continue?', false)) {
            $this->warn('Dropping all tables and re-running migrations...');
            
            $this->callSilent('migrate:fresh');
            
            if ($this->confirm('Would you like to run the database seeders?', true)) {
                $this->call('db:seed');
            }
            
            $this->info('Database has been refreshed successfully.');
        } else {
            $this->info('Operation cancelled.');
        }
    }
}
