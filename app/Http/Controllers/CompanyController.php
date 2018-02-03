<?php

namespace App\Http\Controllers;

use Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get(); 
        
        return view('companies.index', compact('companies'));
    }

    public function create()
    {     
        return view('companies.create');
    }

    public function show($company_id)
    {
        $company = Company::find($company_id);

        return view('companies.show', compact('company'));
    }

    public function store(Request $request)
    {

	    $client = Company::create([
	                        'name' => $request::input('company-name'),
	                        'description' => $request::input('company-description'),
	                        'contact' => $request::input('company-contact')
	                    ]);

        return redirect('/companies');
    }

    public function edit($company_id)
    {
        $company = Company::find($company_id);
      
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $course_id)
    {
        $course = Company::find($course_id)->update([
                    'name' => $request::input('company-name'),
                    'description' => $request::input('company-description'),
                    'contact' => $request::input('company-contact')
        		]);

        return redirect('/companies');
    }
    
    public function delete($company_id)
    {
        Company::find($company_id)->delete();

        return redirect()->route('company-list');
    }

}
