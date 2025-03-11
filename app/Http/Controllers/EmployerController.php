<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployerController extends Controller
{

    public function index(): View
    {
        return view('employer.index');
    }
}
