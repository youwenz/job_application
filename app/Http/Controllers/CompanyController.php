<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

class CompanyController extends Controller
{
    // Employer HomePage
    public function index() {
        return view('companies.index');
    }

    // Return all company list for employee view
    public function list() {
        return view('companies.list', ['companies' => Company::all()]);
    }

    // Display the form to create a company
    public function create() {
        return view('companies.create');
    }

    // Store a new company
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'zipcode' => 'required|string|max:10',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_size' => 'required|string',
            'description' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'industry_type' => 'required|string',
        ]);

        $companyData = $request->except('logo');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $companyData['logo'] = $logoPath;
        }

        Company::create($companyData);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // Show company details for employees
    public function viewCompany($id) {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    // Show company details for employers
    public function viewCompanyEmployer($id) {
        $company = Company::findOrFail($id);
        return view('companies.showEmployer', compact('company'));
    }

    // Show edit form
    public function edit($id) {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }
    public function update(Request $request, $id)
{
    $company = Company::findOrFail($id);

    // Fill the model with new data
    $company->fill($request->except(['_token', '_method']));
    $company->save();
    return redirect()->route('companies.showEmployer', $company->id)
            ->with('success', 'Company updated successfully.');
}

    // Delete company
    public function deleteCompany($id) {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
