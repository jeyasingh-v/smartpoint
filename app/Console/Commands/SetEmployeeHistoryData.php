<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\EmployeeWebHistory;
use Illuminate\Console\Command;

class SetEmployeeHistoryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empwebhistory:SET {ip} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Employee Web History Data';

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
        $ip = $this->argument('ip');
        $url = $this->argument('url');
        $employee = Employee::where('ip_address', $ip)->first(); 
        if($employee == null){
            $this->error("IP Address is not mapped to any employee record. Please add employee record first..."); 
        }else{
            $data = [
                'emp_id' => $employee->emp_id,
                'ip_address' => $ip,
                'url' => $url
            ];

            try{
                EmployeeWebHistory::create($data);
                $this->info("Employee History Record Added Successfully...");
            }catch(Exception $e){
                $this->info($e->getMessage());
            }catch(\Illuminate\Database\QueryException $e){ 
                $this->info($e->getMessage());
            }            
        }
    }
}
