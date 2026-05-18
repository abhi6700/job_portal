<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobApplicationPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(Company $company, JobApplication $jobApplication): bool
    {
        return $company->id === $jobApplication->vacancy->company_id;
    }
}
