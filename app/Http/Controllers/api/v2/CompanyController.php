<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderby('name','asc')->get();
        $transformedCompany = $companies->map(function($company){
           
            return[
                'id'=>$company->id,
                'name'=>$company->name,
                'image_path'=>$company->GetLogoImage(),
            ];
        });
            
        return response()->json(['data' => $companies], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
