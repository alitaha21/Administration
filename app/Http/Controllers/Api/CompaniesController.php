<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    public function index() {
        $query = Company::select('name', 'email', 'website');
        return datatables($query)->make(true);
    }
}
