<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index', ['companies' => Company::all()]);
    }

    public function viewCompany($id) {
        return view('companies.list', ['company' => Company::findOrFail($id)]);
    }

    public function create() {
        // return "This is the create page.";
        return view('companies.create'); // Display the form to create a company
    }
    public function createCompany(Request $request) {
        Company::create($request->all());
        return redirect('companies');
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
