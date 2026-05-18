<?php

namespace App\Http\Controllers\applicant\vacancy;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyConroller extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::with('company')->where('status', 'open')->latest('id')->get();
        return view('applicant.vacancy.index', compact('vacancies'));
    }

    ## show vacancy details
    public function details(String $id){
        $vacancy = Vacancy::with('company')->findOrFail($id);
        $job_application = JobApplication::where('user_id', Auth::id())
            ->where('vacancy_id', $id)->exists();
        return view('applicant.vacancy.details', compact('vacancy', 'job_application'));
    }
}
