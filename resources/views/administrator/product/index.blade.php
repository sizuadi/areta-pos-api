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
                            <h5 class="card-title">Produk</h5>
                        </div>
                        <div class="col-6">
                            <div class="card-tools text-right">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}

                            <div class="button-wrapper">
                                <a href="{{ route('admin.products.show', ['product' => $product]) }}" class="btn btn-info text-light">Detail</a>
                                <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-secondary">Edit</a>
                                <button class="btn btn-danger" onclick="deleteConfirmation(`#form-delete-{{ $product->id }}`)">Hapus</button>

                                <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="post" id="form-delete-{{ $product->id }}" class="d-none"></form>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Produk masih kosong.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="card-footer pb-0">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
