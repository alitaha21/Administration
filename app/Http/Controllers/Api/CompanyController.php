<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCompanyRequest;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->only('name', 'email', 'logo', 'website');
        
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
        } else {
            $filename = "";
        }

        return Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $request->only(['name', 'email', 'logo', 'website']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
        } else {
            $filename = $company->logo;
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' => $request->website
        ]);
        // dd($company);
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Company::findOrFail($id)->delete();
    }
}
