<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\AddCompanyRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;
// use Image;

class CompaniesController extends Controller
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
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.add-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(AddCompanyRequest $request)
    {   

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
        } else {
            $filename = '';
        }

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);

        return redirect('/company/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = Employee::get();
        return view('company.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(AddCompanyRequest $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);
        } else {
            $filename = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);

        return redirect('/company/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/company/all');
    }
}
