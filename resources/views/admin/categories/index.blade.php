@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fa-solid fa-folder-tree me-2 text-success"></i>Categories
                </h5>
                <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm text-white">
                    <i class="fa-solid fa-plus me-1"></i>New Category
                </a>
            </div>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-top-0">ID</th>
                            <th class="border-top-0">Name (EN)</th>
                            <th class="border-top-0">Name (BN)</th>
                            <th class="border-top-0">Slug</th>
                            <th class="border-top-0 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $category->id }}</td>
                                <td class="fw-medium">{{ $category->name_en }}</td>
                                <td>{{ $category->name_bn }}</td>
                                <td class="text-muted small"><code>{{ $category->slug }}</code></td>
                                <td class="text-end pe-4">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="btn btn-outline-secondary" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No categories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
