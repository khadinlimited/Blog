@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label for="title_en" style="display: block; margin-bottom: 5px;">Title (English)</label>
                <input type="text" name="title_en" id="title_en" value="{{ $post->title_en }}" required
                    style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="title_bn" style="display: block; margin-bottom: 5px;">Title (Bangla)</label>
                <input type="text" name="title_bn" id="title_bn" value="{{ $post->title_bn }}" required
                    style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="featured_image" style="display: block; margin-bottom: 5px;">Featured Image (Thumbnail)</label>
                @if ($post->featured_image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="Thumbnail"
                            style="max-height: 100px; border-radius: 4px;">
                    </div>
                @endif
                <input type="file" name="featured_image" id="featured_image" style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="gallery_images" style="display: block; margin-bottom: 5px;">Add Gallery Images</label>
                @if ($post->images->count() > 0)
                    <div style="margin-bottom: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                        @foreach ($post->images as $img)
                            <img src="{{ Storage::url($img->image_path) }}" alt="Gallery"
                                style="height: 60px; border-radius: 4px; border: 1px solid #ddd;">
                        @endforeach
                    </div>
                @endif
                <input type="file" name="gallery_images[]" id="gallery_images" multiple
                    style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="category_id" style="display: block; margin-bottom: 5px;">Category</label>
                <select name="category_id" id="category_id" required style="width: 100%; padding: 8px;">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name_en }} ({{ $category->name_bn }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="body_en" style="display: block; margin-bottom: 5px;">Content (English)</label>
                <textarea name="body_en" id="body_en" rows="5" required style="width: 100%; padding: 8px;">{{ $post->body_en }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="body_bn" style="display: block; margin-bottom: 5px;">Content (Bangla)</label>
                <textarea name="body_bn" id="body_bn" rows="5" required style="width: 100%; padding: 8px;">{{ $post->body_bn }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
                <select name="status" id="status" required style="width: 100%; padding: 8px;">
                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
@endsection
