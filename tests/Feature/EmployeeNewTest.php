<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\EmployeeWebHistory;

class EmployeeNewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $ip_address = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
        $data = [
            'emp_id' => rand(),
            'emp_name' => "Test - ".rand(),
            'ip_address' => $ip_address
        ];

        try{
            Employee::create($data);
            echo "\nNew Employee Created Successfully...";
            $this->assertTrue(TRUE);
        }catch(Exception $e){
            echo "\nNew Employee Creation Failed...";
            $this->assertFalse(TRUE);
        }catch(\Illuminate\Database\QueryException $e){ 
            echo "\nNew Employee Creation Failed...";
            $this->assertFalse(TRUE);
        }

        $employee = Employee::select('id','emp_id', 'emp_name', 'ip_address')->where('ip_address', $ip_address)->get();
        if(!$employee->isEmpty()){
            echo "\nSuccessfully retrieved Employee Details..";
            echo "\n";
            echo json_encode($employee);
            echo "\n\n";
             $this->assertTrue(TRUE);
        }else{
            echo "Unable to find Employee...";
        }


        $url = "https://www.google.com";
        $employee = Employee::where('ip_address', $ip_address)->first(); 
        if($employee == null){
            echo "IP Address is not mapped to any employee record. Please add employee record first..."; 
            $this->assertFalse(TRUE);
        }else{
            $data = [
                'emp_id' => $employee->emp_id,
                'ip_address' => $ip_address,
                'url' => $url
            ];

            try{
                EmployeeWebHistory::create($data);
                echo "Employee History Record Added Successfully...";
                $this->assertTrue(TRUE);
            }catch(Exception $e){
                $this->assertFalse(TRUE);
            }catch(\Illuminate\Database\QueryException $e){ 
                $this->assertFalse(TRUE);
            }            
        }


        $employeeHistory = EmployeeWebHistory::select('id','emp_id', 'ip_address', 'url')->where('ip_address', $ip_address)->get();
        if(!$employeeHistory->isEmpty()){
            echo "\nSuccessfully retrieved Employee History Details..";
            echo "\n";
            echo json_encode($employeeHistory);
            echo "\n\n";
            $this->assertTrue(TRUE);
        }else{
            echo "Unable to find Employee History...";
            $this->assertFalse(TRUE);
        }


        $res = EmployeeWebHistory::where('ip_address',$ip_address)->delete();
        if($res){
            echo "\n".$res." Employee History Record(s) are Deleted Successfully...";
            $this->assertTrue(TRUE);
        }else{
            echo "Unable to find Employee History Record(s)...";
            $this->assertFalse(TRUE);
        }


        
        $res = Employee::where('ip_address',$ip_address)->delete();
        if($res){
            echo "\nEmployee Record Deleted Successfully...";
            $this->assertTrue(TRUE);
        }else{
            echo "\nUnable to find Employee...";
            $this->assertFalse(TRUE);
        }
    }
}
