<?php

namespace App\Http\Controllers\company\job_application;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class jobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with(['user', 'company', 'vacancy'])
        ->whereHas('company', function ($query) {
            $query->where('company_id', Auth::guard('company')->id());
        })
        ->latest('id')
        ->paginate(3);
        return view('company.job-applications.index', compact('applications'));
    }

    ## Show details of a specific job application
    public function details(String $id)
    {
        $application = JobApplication::with(['user', 'company', 'vacancy'])
            ->whereHas('company', function ($query) {
                $query->where('company_id', Auth::guard('company')->id());
            })
            ->findOrFail($id);

        return view('company.job-applications.details', compact('application'));
    }

    ## Update the status of a job application
    public function update(Request $request, String $id)
    {
        $application = JobApplication::
            where('id', $id)->findOrFail($id);

        if (Gate::denies('update', $application)) {
            return redirect()->back()->with('error', 'Unauthorized action!');
        }

        if($application->status == $request->input('status')) {
            return redirect()->route('company.job-application.details', $id)
                ->with('error', 'Application already updated.');
        }
        
        if(!in_array($request->input('status'), ['pending', 'accepted', 'rejected'])) {
            return redirect()->route('company.job-application.details', $id)
                ->with('error', 'Something went wrong!');
        }

        $application->status = $request->input('status');
        $application->update();
        return redirect()->route('company.job-application.details', $id)
            ->with('success', 'Application status updated successfully.');
    }
}
