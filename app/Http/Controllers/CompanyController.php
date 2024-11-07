<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10); // Pagination
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;


        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
            session()->flash('success','Company created successfully!');
        }

        $company->save();
        return redirect()->route('companies.index');
    }
    

}
