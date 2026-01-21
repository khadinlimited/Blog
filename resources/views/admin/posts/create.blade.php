@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Post</h1>
            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back
                </a>
                <button type="submit" form="post-form" class="btn btn-primary">
                    <i class="fa-solid fa-save me-1"></i> Save
                </button>
            </div>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="post-form">
            @csrf
            <div class="row">
                <!-- Left Column: Main Content -->
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-pen-to-square me-1"></i>
                                Post Details</h6>
                        </div>
                        <div class="card-body">
                            <!-- English Title -->
                            <div class="mb-3">
                                <label for="title_en" class="form-label fw-bold">Title (English) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                    name="title_en" id="title_en" value="{{ old('title_en') }}" required
                                    placeholder="Enter post title in English">
                                @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bangla Title -->
                            <div class="mb-3">
                                <label for="title_bn" class="form-label fw-bold">Title (Bangla) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title_bn') is-invalid @enderror"
                                    name="title_bn" id="title_bn" value="{{ old('title_bn') }}" required
                                    placeholder="Enter post title in Bangla">
                                @error('title_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- English Body -->
                            <div class="mb-3">
                                <label for="body_en" class="form-label fw-bold">Content (English) <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('body_en') is-invalid @enderror" name="body_en" id="body_en" rows="10"
                                    required placeholder="Write your post content here...">{{ old('body_en') }}</textarea>
                                @error('body_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bangla Body -->
                            <div class="mb-3">
                                <label for="body_bn" class="form-label fw-bold">Content (Bangla) <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('body_bn') is-invalid @enderror" name="body_bn" id="body_bn" rows="10"
                                    required placeholder="Write your post content here...">{{ old('body_bn') }}</textarea>
                                @error('body_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-lg-4">
                    <!-- Publish Card -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-rocket me-1"></i> Publish
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="status" class="form-label fw-bold">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status"
                                    id="status" required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Category Card -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-folder me-1"></i> Category
                            </h6>
                        </div>
                        <div class="card-body">
                            <label for="category_id" class="form-label visually-hidden">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name_en }} ({{ $category->name_bn }})
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Featured Image Card -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa-regular fa-image me-1"></i> Featured
                                Image</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                name="featured_image" id="featured_image" accept="image/*">
                            <div class="form-text text-muted">Supported formats: jpg, png, jpeg. Max: 2MB.</div>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Gallery Images Card -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-images me-1"></i> Gallery
                                Images</h6>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control @error('gallery_images') is-invalid @enderror"
                                name="gallery_images[]" id="gallery_images" multiple accept="image/*">
                            <div class="form-text text-muted">You can select multiple images.</div>
                            @error('gallery_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
