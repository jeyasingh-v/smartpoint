<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class SetEmployeeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'empdata:SET {id} {name} {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Employee Data';

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
        $data = [
            'emp_id' => $this->argument('id'),
            'emp_name' => $this->argument('name'),
            'ip_address' => $this->argument('ip')
        ];
        try{
            Employee::create($data);
            $this->info("Employee Record Added Successfully...");
        }catch(Exception $e){
            $this->info($e->getMessage());
        }catch(\Illuminate\Database\QueryException $e){ 
            $this->info($e->getMessage());
        }
    }
}
