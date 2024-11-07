<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|phone',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if ($request->hasFile('profile_picture')) {
            $employee->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'private');
        }

        $employee->save();
        return redirect()->route('employees.index');
    }
}
