@extends('applicant.layouts.app')
@section('content')
<h1>My Applications</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->vacancy->title }}</td>
                <td>{{ $application->vacancy->company->name }}</td>
                <td>{{ $application->application_date }}</td>
                <td>{{ ucfirst($application->status) }}</td>
                <td>
                    <a href="{{ route('applicant.vacancy.details', $application->vacancy->id) }}" class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>
            @endforeach
    </table>
</div>

@endsection