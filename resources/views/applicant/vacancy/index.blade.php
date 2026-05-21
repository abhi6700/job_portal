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
<div class="row mt-4">
    <div class="col">
        <nav aria-label="..."> 
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $vacancies->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $vacancies->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
                @foreach($vacancies->getUrlRange(1, $vacancies->lastPage()) as $page => $url)
                <li class="page-item {{ $vacancies->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach
                <li class="page-item {{ $vacancies->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $vacancies->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection