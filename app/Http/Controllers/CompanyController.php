<?php

namespace App\Http\Controllers;

use Request;
use App\User;
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
        $company = Company::where('id', $company_id)->with('clients')->first();

        return view('companies.show', compact('company'));
    }

    public function enroll($company_id)
    {     

        $company = Company::find($company_id);

        COUNT($company->clients) ? $totalClients = $company->clients()->first()->count: $totalClients = 0;

        return view('companies.enroll', compact('company', 'totalClients'));
    }

    public function enrollSave(Request $request)
    {
        //Get existing client
        $client = User::find($request::input('client-id'));
        $request::session()->forget('status');

        if($client){

            if($client->company_id == $request::input('company_id')){

                $request::session()->flash('status', $client->first_name . ' is already a member for this company!');
                $request::session()->flash('type', 'warning');

            }else{

                $oldCompany = '';
                
                if($client->company_id){
                    $oldCompany = Company::find($client->company_id);
                }

                $newCompany = Company::find($request::input('company_id'));

                //Update client company
                $updated = $client->update([
                                'company_id' => $request::input('company_id')
                            ]);

                if($updated){
                    if($oldCompany != ''){
                        $request::session()->flash('status', $client->first_name . ' was successfully moved from "'.$oldCompany->name.' company" and added to "'.$newCompany->name.' company"!');
                        $request::session()->flash('type', 'success');

                    }else{
                        $request::session()->flash('status', $client->first_name . ' has been successfully added to "'.$newCompany->name.' company"!');
                        $request::session()->flash('type', 'success');

                    }                    
                }else{
                    $request::session()->flash('status', $client->first_name . ' was not added. Something went wrong! Try again.!');
                    $request::session()->flash('type', 'danger');                   
                }

            }

        }

        return redirect()->route('company-enroll', [$request::input('company_id')]);

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
