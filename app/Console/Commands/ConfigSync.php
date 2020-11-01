<?php

namespace App\Console\Commands;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

/**
 * Command Class ConfigSync.
 *
 * @author  Rakitha Dissanayake <rakithadd@gmail.com>
 */
class ConfigSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '  Sync config data from HNBA server';

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
        \Log::info("Config Sync Cron execution!");
        $this->info('Sync started!');
       
        \DB::table('appointments')
        ->where('date','<', date('Y-m-d'))
        ->wherein('status',['Pending','Rescheduled'])
        ->update(['status' => 'Expired']);

        // ('echo "Hello World"')
        // ->appendOutputTo('/storage/logs/laravelcron.log');

        $this->info('Sync completed!');
      
    }
}
