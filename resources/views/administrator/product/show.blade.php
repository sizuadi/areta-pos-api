@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-8 col-lg-8 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{ $product->image ? $product->image->source : asset('images/placeholder-image.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h5 class="card-title">Rp. {{ number_format($product->price, 2, ',', '.') }}</h5>
                    <p class="card-text">
                        {!! $product->description !!}
                    </p>
                    <span class="badge badge-secondary font-weight-normal p-2">{{ $product->category->name }}</span>
                    <div class="dropdown-divider"></div>
                    <div class="text-center">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Kembali</a>
                        <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('admin.products.image', ['product' => $product]) }}" class="btn btn-info">Ubah Gambar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
