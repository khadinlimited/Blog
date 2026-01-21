@extends('layouts.admin')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h4 mb-0 text-gray-800">Dashboard Overview</h2>
        </div>
    </div>

    <div class="row g-4">
        <!-- Posts Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.85rem;">Total Posts</p>
                            <h2 class="mb-0 fw-bold text-dark">{{ $postCount }}</h2>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 text-primary">
                            <i class="fa-solid fa-newspaper fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.85rem;">Categories</p>
                            <h2 class="mb-0 fw-bold text-dark">{{ $categoryCount }}</h2>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3 text-success">
                            <i class="fa-solid fa-folder-tree fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
