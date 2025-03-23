<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index', ['companies' => Company::all()]);
    }

    public function viewCompany($id) {//return company view by id
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function create() {
        return view('companies.create'); // Display the form to create a company
    }
    public function store(Request $request) {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $companyData = $request->except('logo');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $companyData['logo'] = $logoPath;
        }

        Company::create($companyData);

        return redirect('companies')->with('success', 'Company created successfully.');
    }


    public function updateCompany(Request $request, $id) {
        Company::find($id)->update($request->all());
        return redirect('companies');
    }

    public function deleteCompany($id) {
        Company::find($id)->delete();
        return redirect('companies');
    }
}
