@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Category</h1>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back
                </a>
                <button type="submit" form="category-form" class="btn btn-success text-white">
                    <i class="fa-solid fa-save me-1"></i> Save
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fa-solid fa-folder-plus me-1"></i> Category
                            Details</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST" id="category-form">
                            @csrf
                            <div class="mb-3">
                                <label for="name_en" class="form-label fw-bold">Name (English) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                    name="name_en" id="name_en" value="{{ old('name_en') }}" required
                                    placeholder="e.g. Technology">
                                @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name_bn" class="form-label fw-bold">Name (Bangla) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name_bn') is-invalid @enderror"
                                    name="name_bn" id="name_bn" value="{{ old('name_bn') }}" required
                                    placeholder="e.g. প্রযুক্তি">
                                @error('name_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
