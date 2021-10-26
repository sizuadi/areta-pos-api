@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <h3>Produk</h3>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <form method="get" id="form-search" onsubmit="event.preventDefault();">
                <div class="form-group">
                    <input type="text" class="form-control @error('search') is-invalid @enderror" id="search" name="search" placeholder="Cari produk" value="{{ request('search') }}">
                </div>
            </form>
        </div>
    </div>

    <div class="row product-row"></div>
</div>
@endsection

@section('scripts')
<script>
    var route = "{{ route('products.index') }}";
    var searchKeyword = document.querySelector('#search');

    let products = () => {
        fetch(route).then(response => response.json()).then(response => {
            if (response.data.length > 0) {
                response.data.forEach(item => populateProduct(item));
                return;
            }

            productsEmpty();
        });
    }

    document.addEventListener("DOMContentLoaded", function (event) {
        if (searchKeyword.value.length > 0) {
            route = route + '?name=' + searchKeyword.value;
        }

        let productRow = document.querySelector('.product-row');
        productRow.innerHTML = null;

        products();
    });

    searchKeyword.addEventListener('input', function (event) {
        setTimeout(function() {
            if (searchKeyword.value.length >= 0) {
                route = "{{ route('products.index', ['name' => ':keyword']) }}".replace('%3Akeyword', searchKeyword.value || '');
            }

            let productRow = document.querySelector('.product-row');
            productRow.innerHTML = null;
            products();
        }, 300);
    });

</script>
@endsection
