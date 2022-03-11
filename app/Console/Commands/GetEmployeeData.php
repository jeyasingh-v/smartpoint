<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class GetEmployeeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:GET {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Employee record by IP';

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
        $employee = Employee::select('id','emp_id', 'emp_name', 'ip_address')->where('ip_address', $ip_address)->get();
        if(!$employee->isEmpty()){
            echo json_encode($employee);
        }else{
            echo "Unable to find Employee...";
        }
    }
}
