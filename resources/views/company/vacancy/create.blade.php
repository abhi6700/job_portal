@extends('company.layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Vacancy</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.vacancy.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Vacancy Title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="Enter vacancy title">
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Number of Positions</label>
                            <input
                                type="number"
                                class="form-control"
                                name="number_of_positions"
                                value="{{ old('number_of_positions') }}"
                                placeholder="Enter number of positions">
                                @error('number_of_positions')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Vacancy Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                rows="3"
                                placeholder="Enter vacancy description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>

                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection