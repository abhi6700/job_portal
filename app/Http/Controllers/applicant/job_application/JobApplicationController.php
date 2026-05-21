<?php

namespace App\Http\Controllers\applicant\job_application;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    ## list of my applications
    public function index()
    {
        $applications = JobApplication::where('user_id', Auth::id())
            ->with('vacancy')
            ->paginate(10);
        return view('applicant.job_application.index', compact('applications'));
    }

    ## apply for a job
    public function apply(String $id)
    {
        $job_application = JobApplication::where('user_id', Auth::id())->where('vacancy_id', $id)->first();
        if ($job_application) {
            return redirect()->route('applicant.vacancy.details', $id)
                ->with('error', 'You have already applied for this job!');
        }
        JobApplication::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $id,
            'application_date' => now(),
        ]);
        return redirect()->route('applicant.vacancy.details', $id)
            ->with('success', 'Application submitted successfully!');
    }
}
