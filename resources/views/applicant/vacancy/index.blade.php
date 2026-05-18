@extends('applicant.layouts.app')
@section('content')
<h1>Vacancies</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($vacancies as $vacancy)
    <div class="col">
        <div class="card h-100">
            <div class="text-center">
                <img src="{{ asset('storage/' . $vacancy->company->logo) }}" class="card-img-top" alt="..." style="width:150px;height:auto;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $vacancy->title }}</h5>
                <p class="card-text">{{ Str::words($vacancy->description, 10, '...') }}</p>
                <div class="text-center">
                    <a href="{{ route('applicant.vacancy.details', $vacancy->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection