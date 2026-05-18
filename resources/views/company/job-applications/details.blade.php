@extends('company.layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Application Details</h1>
</div>
<div class="card shadow border-0">
    <div class="card-body p-5">

        <!-- Job Title -->
        <h2 class="text-center fw-bold mb-2">
            {{ $application->vacancy->title }}
        </h2>

        <p class="text-center text-muted mb-4">
            No of Positions: {{ $application->vacancy->number_of_positions }}
        </p>

        <!-- Description -->
        <div class="mb-5">
            <h4 class="fw-bold mb-3">Job Description</h4>

            <p class="text-muted">
                {{ $application->vacancy->description }}
            </p>
        </div>

        <!-- Applicant Details -->
        <div>
            <h4 class="fw-bold mb-3">Applicant Details</h4>
            <p><strong>Name:</strong> {{ $application->user->name }}</p>
            <p><strong>Email:</strong> {{ $application->user->email }}</p>
            <p><strong>Phone:</strong> {{ $application->user->mobile }}</p>
        </div>  
        <form action="{{ route('company.job-application.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')   
        <div class="mt-4 col-md-6">
            <label for="status" class="form-label fw-bold">Application Status</label>
            <select class="form-select" name="status" id="status">
                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div class="mt-4">
            <a href="{{ route('company.job-application.index') }}" class="btn btn-secondary">Back to Applications</a>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        </form>
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