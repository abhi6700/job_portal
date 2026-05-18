@extends('company.layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Vacancies</h1>

    <a href="{{ route('company.vacancy.create') }}" class="btn btn-primary">
        Create
    </a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">No of Positions</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vacancies as $vacancy)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vacancy->title }}</td>
                <td>{{ $vacancy->number_of_positions }}</td>
                <td>{{ $vacancy->status }}</td>
                <td>
                    <a href="{{ route('company.vacancy.edit', $vacancy->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('company.vacancy.destroy', $vacancy->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection