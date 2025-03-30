<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Company;

class CompanyProfile extends Component
{
    public $company;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.company-profile');
    }
}
