<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Company;
use App\Http\Requests\AddEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employee.add-employee', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {
        $user = Auth::user();
        $companies = Company::get();
        $company_id = 0;
        foreach($companies as $company) {
            if ($request->company === $company->name) {
                $company_id = $company->id;
            }
        }

        Employee::create([
            'user_id' => $user->id,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'company_id' => $company_id,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        
        return redirect('/employee/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $companies = Company::get();
        return view('employee.show', compact('employee', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(AddEmployeeRequest $request, Employee $employee)
    {
        $user = Auth::user();
        $companies = Company::get();
        $company_id = 0;
        foreach($companies as $company) {
            if ($request->company === $company->name) {
                $company_id = $company->id;
            }
        }

        $employee->update([
            'user_id' => $user->id,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'company_id' => $company_id,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        
        return redirect('/employee/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employee/all');
    }
}
