@extends('applicant.layouts.app')
@section('content')
<h1>My Applications</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($applications as $application)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $application->vacancy->title }}</td>
                <td>{{ $application->vacancy->company->name }}</td>
                <td>{{ $application->application_date->format('d-m-Y') }}</td>
                <td>{{ ucfirst($application->status) }}</td>
                <td>
                    <a href="{{ route('applicant.vacancy.details', $application->vacancy->id) }}" class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>
            @endforeach
    </table>
</div>
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
</div>

@endsection