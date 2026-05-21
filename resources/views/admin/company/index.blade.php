@extends('admin.layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Companies</h1>

    <a href="{{ route('admin.company.create') }}" class="btn btn-primary">
        Create
    </a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="" width="90"></td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->phone }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row mt-4">
    <div class="col">
        <nav aria-label="..."> 
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $companies->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $companies->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
                @foreach($companies->getUrlRange(1, $companies->lastPage()) as $page => $url)
                <li class="page-item {{ $companies->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach
                <li class="page-item {{ $companies->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $companies->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection