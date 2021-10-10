<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
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
        //
        $employee = Employee::with('company')->latest()->paginate(5);


        return view('employee.index', compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company = Company::all()->pluck('name','id');
         return view('employee.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required', 
             'last_name' => 'required',  
            'email' => 'email',  
             
                          
        ]); 
         

        $data['first_name']=$request->input('first_name');
        $data['last_name']=$request->input('last_name');
        $data['email']=$request->input('email');
        $data['phone']=$request->input('phone');
        $data['company_id']=$request->input('company_id');
        employee::create($data);

        return redirect()->route('employees.index')
            ->with('success', 'employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
                $company = Company::all()->pluck('name','id');
        //
        return view('employee.show', compact('employee','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
          $company = Company::all()->pluck('name','id');
        
        return view('employee.edit', compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        //
        $request->validate([
            'first_name' => 'required',  
             'last_name' => 'required', 
            'email' => 'email',  
             
                          
        ]); 
        $data['first_name']=$request->input('first_name');
        $data['last_name']=$request->input('last_name');
        $data['email']=$request->input('email');
        $data['phone']=$request->input('phone');
        $data['company_id']=$request->input('company_id');
        $employee->update($data);

        return redirect()->route('employees.index')
            ->with('success', 'employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
         $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
