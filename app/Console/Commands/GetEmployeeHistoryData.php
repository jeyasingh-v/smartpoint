<?php

namespace App\Console\Commands;

use App\Models\EmployeeWebHistory;
use Illuminate\Console\Command;

class GetEmployeeHistoryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:GET {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Employee History record by IP';

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
        $employeeHistory = EmployeeWebHistory::select('id','emp_id', 'ip_address', 'url')->where('ip_address', $ip_address)->get();
        if(!$employeeHistory->isEmpty()){
            echo json_encode($employeeHistory);
        }else{
            echo "Unable to find Employee History...";
        }
    }
}
