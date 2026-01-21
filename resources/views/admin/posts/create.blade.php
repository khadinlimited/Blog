@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="title_en" style="display: block; margin-bottom: 5px;">Title (English)</label>
                <input type="text" name="title_en" id="title_en" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="title_bn" style="display: block; margin-bottom: 5px;">Title (Bangla)</label>
                <input type="text" name="title_bn" id="title_bn" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="featured_image" style="display: block; margin-bottom: 5px;">Featured Image (Thumbnail)</label>
                <input type="file" name="featured_image" id="featured_image" style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="gallery_images" style="display: block; margin-bottom: 5px;">Gallery Images</label>
                <input type="file" name="gallery_images[]" id="gallery_images" multiple
                    style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="category_id" style="display: block; margin-bottom: 5px;">Category</label>
                <select name="category_id" id="category_id" required style="width: 100%; padding: 8px;">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_en }} ({{ $category->name_bn }})</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="body_en" style="display: block; margin-bottom: 5px;">Content (English)</label>
                <textarea name="body_en" id="body_en" rows="5" required style="width: 100%; padding: 8px;"></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="body_bn" style="display: block; margin-bottom: 5px;">Content (Bangla)</label>
                <textarea name="body_bn" id="body_bn" rows="5" required style="width: 100%; padding: 8px;"></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
                <select name="status" id="status" required style="width: 100%; padding: 8px;">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <button type="submit" class="btn">Create</button>
        </form>
    </div>
@endsection
