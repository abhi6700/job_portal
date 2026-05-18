@extends('admin.layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Company</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter company name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="company@email.com">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input
                                type="text"
                                class="form-control"
                                name="website"
                                value="{{ old('website') }}"
                                placeholder="https://example.com">
                            @error('website')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input
                                type="text"
                                class="form-control"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="+91 9876543210">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Address</label>
                            <textarea
                                class="form-control"
                                name="address"
                                rows="3"
                                placeholder="Enter company address">{{ old('address') }}</textarea>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Industry</label>
                                <select class="form-select" name="industry">
                                    <option selected>Select Industry</option>
                                    <option {{ old('industry') == 'IT' ? 'selected' : '' }}>IT</option>
                                    <option {{ old('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option {{ old('industry') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                </select>
                                @error('industry')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Size</label>
                                <select class="form-select" name="size">
                                    <option selected>Select Size</option>
                                    <option {{ old('size') == '1-10 Employees' ? 'selected' : '' }}>1-10 Employees</option>
                                    <option {{ old('size') == '11-50 Employees' ? 'selected' : '' }}>11-50 Employees</option>
                                    <option {{ old('size') == '51-200 Employees' ? 'selected' : '' }}>51-200 Employees</option>
                                    <option {{ old('size') == '201-500 Employees' ? 'selected' : '' }}>201-500 Employees</option>
                                    <option {{ old('size') == '500+ Employees' ? 'selected' : '' }}>500+ Employees</option>
                                </select>
                                @error('size')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Description</label>
                            <textarea
                                class="form-control"
                                rows="4"
                                name="description"
                                placeholder="Write company description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Company Logo</label>
                            <input
                                type="file"
                                name="logo"
                                class="form-control">
                            @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
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