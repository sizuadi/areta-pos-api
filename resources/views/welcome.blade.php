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
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari produk" value="{{ request('keyword') }}">
                    <small class="form-text text-muted">Tekan enter untuk mencari.</small>
                </div>
            </form>
        </div>
    </div>

    <div class="row product-row"></div>

    <div class="row mt-2">
        <div class="col-12" id="product-pagination">

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var route = "{{ route('api.products.index') }}";
    var searchKeyword = document.querySelector('#keyword');
    var pageNumber, nextPage, prevPage;

    var searchFn = () => setTimeout(function() {
        if (searchKeyword.value.length >= 0) {
            route = "{{ route('api.products.index', ['name' => 'keyword']) }}".replace('keyword', searchKeyword.value || '');
        }

        let productRow = document.querySelector('.product-row');
        productRow.innerHTML = null;

        products(route);
    }, 500);

    let products = (route) => {
        fetch(route).then(response => response.json()).then(response => {
            if (response.products.data.length > 0) {
                response.products.data.forEach(item => populateProduct(item));
                $('#product-pagination').empty().append($(response.pagination));

                prevPage = document.querySelector('#button-prev');
                nextPage = document.querySelector('#button-next');
                pageNumber = document.querySelectorAll('.page-number');

                Array.prototype.forEach.call(pageNumber, function (node) {
                    node.addEventListener('click', function (event) {
                        let productRow = document.querySelector('.product-row');

                        route = event.target.dataset.page;
                        productRow.innerHTML = null;

                        products(route);
                    });
                });

                prevPage.addEventListener('click', function (event) {
                    let productRow = document.querySelector('.product-row');

                    route = event.target.dataset.prev;
                    productRow.innerHTML = null;

                    products(route);
                });

                nextPage.addEventListener('click', function (event) {
                    let productRow = document.querySelector('.product-row');

                    route = event.target.dataset.next;
                    productRow.innerHTML = null;

                    products(route);
                });

                return;
            }

            productsEmpty();
        });
    }

    document.addEventListener("DOMContentLoaded", function (event) {
        let productRow = document.querySelector('.product-row');
        productRow.innerHTML = null;

        products(route);
    });

    searchKeyword.addEventListener('change', searchFn);

</script>
@endsection
