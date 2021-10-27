@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">Kategori</h5>
                        </div>
                        <div class="col-6">
                            <div class="card-tools text-right">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $category->name }}

                            <div class="button-wrapper">
                                <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-secondary">Edit</a>
                                <button class="btn btn-danger" onclick="deleteConfirmation(`#form-delete-{{ $category->id }}`)">Hapus</button>

                                <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post" id="form-delete-{{ $category->id }}" class="d-none"></form>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Kategori masih kosong.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="card-footer pb-0">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
