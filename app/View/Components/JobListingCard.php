<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobListingCard extends Component
{
    public $jobListing;

    public function __construct($jobListing)
    {
        $this->jobListing = $jobListing;
    }

    public function render()
    {
        return view('components.job-listing-card');
    }
}
