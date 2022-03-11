<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class UnsetEmployeeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:UNSET {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Employee data';

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
        $res = Employee::where('ip_address',$ip_address)->delete();
        if($res){
            $this->error("Employee Record Deleted Successfully...");
        }else{
            $this->info("Unable to find Employee...");
        }
    }
}
