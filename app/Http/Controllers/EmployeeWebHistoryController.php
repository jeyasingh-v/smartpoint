<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeWebHistoryResource;
use App\Models\Employee;
use App\Models\EmployeeWebHistory;
use Illuminate\Http\Request;

class EmployeeWebHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return EmployeeWebHistoryResource::collection(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::where('ip_address', $request->ip_address)->first(); 
        if($employee == null){
            return response()->json(["message" => "IP Address is not mapped to any employee record. Please add employee record first..."], 201); 
        }else{
            $data = [
                'emp_id' => $employee->emp_id,
                'ip_address' => $request->ip_address,
                'url' => $request->url,
            ];

            try{
                EmployeeWebHistory::create($data);
                return response()->json(["message" => "Employee History Record Added Successfully..."], 201);
            }catch(Exception $e){
                return response()->json(["message" => $e->getMessage()], 201);
            }catch(\Illuminate\Database\QueryException $e){ 
                return response()->json(["message" => $e->getMessage()], 201);
            }          
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
        $employees_web_history = Employee::where('ip_address',$ip_address)->get();
        return EmployeeWebHistoryResource::collection($employees_web_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ip_address)
    {
        $res = EmployeeWebHistory::where('ip_address',$ip_address)->delete();
        if($res){
             return response()->json(["message" => $res . " Employee Record Deleted Successfully..."], 201);
        }else{
            return response()->json(["message" => "Unable to find Employee History Record(s)..."], 201);
        }
    }
}
