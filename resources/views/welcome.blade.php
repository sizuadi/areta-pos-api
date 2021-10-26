@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <h3>Produk</h3>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <form method="get">
                <div class="form-group row justify-content-between d-flex align-items-center">
                    <div class="col-sm-12 col-md-9 col-lg-9 mb-2 mb-md-0">
                        <input type="text" class="form-control @error('search') is-invalid @enderror" id="search" name="search" placeholder="Cari produk" value="{{ old('search') }}">
                        @error('search')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <button class="btn btn-block btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/paket-advance.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Paket Advance</h5>
                    <h5 class="card-title text-center">Rp. 25.000.000,00</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam cum earum vitae, dolorum perferendis itaque iusto dolore veritatis at?</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/paket-advance.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Paket Advance</h5>
                    <h5 class="card-title text-center">Rp. 25.000.000,00</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam cum earum vitae, dolorum perferendis itaque iusto dolore veritatis at?</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/paket-advance.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Paket Advance</h5>
                    <h5 class="card-title text-center">Rp. 25.000.000,00</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam cum earum vitae, dolorum perferendis itaque iusto dolore veritatis at?</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
