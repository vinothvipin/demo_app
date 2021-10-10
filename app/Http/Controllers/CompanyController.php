<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::latest()->paginate(5);

        return view('company.index', compact('company'))
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
        return view('company.create');
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
        $path = '';
        $request->validate([
            'name' => 'required',  
            'email' => 'email',  
             
                          
        ]);
        if($request->file('logo')){
             $path = Storage::disk('public')->putFile('logo', $request->file('logo'));
        }
       
         

        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['website']=$request->input('website');
        $data['logo_path']=$path;
        Company::create($data);

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $path = '';
        if($company->logo_path){
            $path = Storage::url($company->logo_path);
        }
        //
        return view('company.show', compact('company','path'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $path = '';
        if($company->logo_path){
            $path = Storage::url($company->logo_path);
        }
        
        return view('company.edit', compact('company','path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $path = '';
        $request->validate([
            'name' => 'required',
            'email' => 'email', 
           
        ]);
        if($request->file('logo')){
             $path = Storage::disk('public')->putFile('logo', $request->file('logo'));
        }
       
         

        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['website']=$request->input('website');
        $data['logo_path']=$path;
        $company->update($data);

        return redirect()->route('company.index')
            ->with('success', 'Company details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully');
        
    }
}
