<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Master
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">{{ __('Kategori') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Produk') }}</a>
                            </div>
                        </li>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function populateProduct(item) {
            let productRow = document.querySelector('.product-row');
            let productColumn = document.createElement('div');
            let productCard = document.createElement('div');
            let productImage = document.createElement('img');
            let productCardBody = document.createElement('div');
            let productCardTitle = document.createElement('h5');
            let productCardPrice = document.createElement('h5');
            let productCardDescription = document.createElement('p');
            let buttonWrapper = document.createElement('div');
            let button = document.createElement('button');

            productImage.className = 'card-img-top';
            productImage.src = "{{ asset('images/paket-advance.png') }}";
            productColumn.className = 'col-6 col-md-6 col-lg-4 mb-4';
            productCard.className = 'card';
            productCardBody.className = 'card-body';
            productCardTitle.className = 'card-title text-center';
            productCardTitle.innerHTML = item.name;
            productCardPrice.className = 'card-title text-center';
            productCardPrice.innerHTML = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(item.price);
            productCardDescription.className = 'card-text';
            productCardDescription.innerHTML = item.description;
            buttonWrapper.className = 'text-center';
            button.className = 'btn btn-primary';
            button.innerHTML = 'Beli';

            productCard.appendChild(productImage);
            productCard.appendChild(productCardBody);
            productCardBody.appendChild(productCardTitle);
            productCardBody.appendChild(productCardPrice);
            productCardBody.appendChild(productCardDescription);
            buttonWrapper.appendChild(button);
            productCardBody.appendChild(buttonWrapper);
            productColumn.appendChild(productCard);
            productRow.appendChild(productColumn);
        }

        function productsEmpty() {
            let productRow = document.querySelector('.product-row');
            productRow.innerHTML = null;

            let productColumn = document.createElement('div');
            let productCard = document.createElement('div');
            let productCardBody = document.createElement('div');
            let productCardTitle = document.createElement('h5');

            productCard.className = 'card';
            productCardBody.className = 'card-body';
            productColumn.className = 'col-12';
            productCardTitle.className = 'card-title text-center';
            productCardTitle.innerHTML = 'Produk tidak ditemukan';

            productCard.appendChild(productCardBody);
            productCardBody.appendChild(productCardTitle);
            productColumn.appendChild(productCard);
            productRow.appendChild(productColumn);
        }
    </script>

    @yield('scripts')
</body>
</html>
