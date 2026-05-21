@extends('company.layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Job Applications</h1>
    </div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Applicant</th>
            <th scope="col">Job Title</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $application)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $application->application_date->format('d-m-Y') }}</td>
                <td>{{ $application->user->name }}</td>
                <td>{{ $application->vacancy->title }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('company.job-application.details', $application->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="row mt-4">
    <div class="col">
        <nav aria-label="..."> 
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $applications->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $applications->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
                @foreach($applications->getUrlRange(1, $applications->lastPage()) as $page => $url)
                <li class="page-item {{ $applications->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach
                <li class="page-item {{ $applications->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $applications->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection