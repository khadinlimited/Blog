@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name_en" style="display: block; margin-bottom: 5px;">Name (English)</label>
                <input type="text" name="name_en" id="name_en" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="name_bn" style="display: block; margin-bottom: 5px;">Name (Bangla)</label>
                <input type="text" name="name_bn" id="name_bn" required style="width: 100%; padding: 8px;">
            </div>

            <button type="submit" class="btn">Create</button>
        </form>
    </div>
@endsection
