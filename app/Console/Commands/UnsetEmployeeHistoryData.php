<?php

namespace App\Console\Commands;

use App\Models\EmployeeWebHistory;
use Illuminate\Console\Command;

class UnsetEmployeeHistoryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:UNSET {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Employee History data';

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
        $ip_address = $this->argument('ip');
        $res = EmployeeWebHistory::where('ip_address',$ip_address)->delete();
        if($res){
            $this->error($res." Employee History Record(s) are Deleted Successfully...");
        }else{
            $this->info("Unable to find Employee History Record(s)...");
        }
    }
}
