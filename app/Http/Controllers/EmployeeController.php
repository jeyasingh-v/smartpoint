<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
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
        $this->validate($request, array(
            'emp_id' => 'required',
            'emp_name' => 'required|max:255',
            'ip_address'  => 'required',
        ));
        // store in the database
        $emp = new Employee;
        $emp->emp_id = $request->emp_id;
        $emp->emp_name = $request->emp_name;
        $emp->ip_address = $request->ip_address;
        $emp->save();
        return response()->json(["message" => "employee record created"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
        $employee = Employee::where('ip_address',$ip_address)->get();
        return EmployeeResource::collection($employee);
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
        $res = Employee::where('ip_address',$ip_address)->delete();
        if($res){
            return response()->json(["message" => "Employee Record Deleted Successfully..."], 201);
        }else{
            return response()->json(["message" => "Unable to find Employee..."], 201);
        }
    }
}
