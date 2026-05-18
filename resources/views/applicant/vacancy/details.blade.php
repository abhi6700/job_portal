@extends('applicant.layouts.app')
@section('content')
<h1>Job Details</h1>

<div class="card shadow border-0">
    <div class="card-body p-5">

        <!-- Company Logo -->
        <div class="text-center mb-4">
            <img
                src="{{ asset('storage/' . $vacancy->company->logo) }}"
                alt="Company Logo"
                class="rounded-circle border"
                style="width:100px; height:100px; object-fit:cover;">
        </div>

        <!-- Job Title -->
        <h2 class="text-center fw-bold mb-2">
            {{ $vacancy->title }}
        </h2>

        <!-- Company Name -->
        <p class="text-center text-muted mb-1">
            {{ $vacancy->company->name }}
        </p>

        <p class="text-center text-muted mb-4">
            No of Positions: {{ $vacancy->number_of_positions }}
        </p>

        <!-- Job Info -->
        <!-- <div class="row text-center mb-5">

                <div class="col-md-4 mb-3">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="fw-bold">Location</h6>
                        <p class="mb-0">Ahmedabad</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="fw-bold">Salary</h6>
                        <p class="mb-0">₹40,000 / Month</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="border rounded p-3 bg-light">
                        <h6 class="fw-bold">Job Type</h6>
                        <p class="mb-0">Full Time</p>
                    </div>
                </div>

            </div> -->

        <!-- Description -->
        <div class="mb-5">
            <h4 class="fw-bold mb-3">Job Description</h4>

            <p class="text-muted">
                {{ $vacancy->description }}
            </p>
        </div>

        <!-- Requirements -->
        <!-- <div class="mb-5">
                <h4 class="fw-bold mb-3">Requirements</h4>

                <ul class="list-group">
                    <li class="list-group-item">2+ Years Experience</li>
                    <li class="list-group-item">Strong Laravel Knowledge</li>
                    <li class="list-group-item">MySQL Database Experience</li>
                    <li class="list-group-item">Bootstrap & JavaScript</li>
                    <li class="list-group-item">Git Version Control</li>
                </ul>
            </div> -->

        <!-- Skills -->
        <!-- <div class="mb-5">
                <h4 class="fw-bold mb-3">Skills</h4>

                <span class="badge bg-primary me-2">Laravel</span>
                <span class="badge bg-success me-2">PHP</span>
                <span class="badge bg-dark me-2">MySQL</span>
                <span class="badge bg-info text-dark me-2">Bootstrap</span>
                <span class="badge bg-warning text-dark">API</span>
            </div> -->

        <!-- Buttons -->
        <div class="text-center">
            @if($job_application)
            <button class="btn btn-secondary px-5 me-2" disabled>
                Already Applied
            </button>
            @else
            <form method="POST" action="{{ route('applicant.job_application.apply', $vacancy->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary px-5 me-2">
                    Apply Now
                </button>
            </form>
            @endif
        </div>

        @if(session('success'))
        <div class="alert alert-success mt-4 text-center col-6 offset-3">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger mt-4 text-center col-6 offset-3">
            {{ session('error') }}
        </div>
        @endif

    </div>
</div>

@endsection