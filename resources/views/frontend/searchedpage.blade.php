<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssfile/bookStore.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('frontendcss/show-list.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Q9Kl6OqO2t8j/wr1egU8IayHr6q8fUgbsPRk2KStKfZq76SILSfgDjUX3vZdCvuwB8s5O8Y3IDU5wYSyP9Zn9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        .listar-header {
            background-color: rgba(232, 245, 232, 0.5); /* Transparent green background */
            display: flex; /* Align children (logo and search bar) horizontally */
            justify-content: space-between; /* Space out the logo and search bar */
            align-items: center; /* Vertically center the contents */
            padding: 4px; /* Add some padding around the header contents */
        }
        .search-bar {
            display: flex; /* Align search input and button horizontally */
            gap: 10px; /* Space between search input and button */
        }
        .header-item-search .input-group {
            display: flex;
            align-items: center;
        }
        .header-item-search .form-control {
            flex-grow: 1;
            margin-left: 10px;
        }
        .header-item-search .btn {
            margin-left: 10px;
        }
        .card-container {
            margin-bottom: 20px;
        }
        .shop-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .shop-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .dz-media img {
            width: 100%;
            height: auto;
        }
        .shop-meta {
            margin-top: 10px;
        }
        .dz-content {
            text-align: center;
            margin-top: 15px;
        }
        .dz-content .title {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .dz-content .price {
            color: #28a745;
            font-size: 1rem;
        }
    </style>
</head>
<body class="listar-home listar-hometwo">
    <div class="preloader-outer">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <div id="listar-wrapper" class="listar-wrapper listar-haslayout">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-md-between align-items-start">
                <div class="col-lg-6 col-md-12">
                    <h3>Search Results for "{{ $query }}"</h3>

                </div>
            </div>

            <div class="clearfix">
                <div id="product-container">
                    <ul class="row g-xl-4 g-3">
                        @forelse($products as $product)
                            <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="shop-card">
                                    <div class="dz-media">
                                        <img src="{{ asset('uploads/' . $product->image) }}" alt="Product" height="200">
                                        <div class="shop-meta">
                                            <a href="{{ route('viewDetails', ['productId' => $product->id]) }}" class="btn btn-secondary btn-md btn-rounded">
                                                <i class="fa-solid fa-eye d-md-none d-block"></i>
                                                <span class="d-md-block d-none">View Detail</span>
                                            </a>
                                        </div>                          
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title"><a href="{{ route('viewDetails', ['productId' => $product->id]) }}">{{ $product->name }}</a></h5>
                                        <h5 class="price">₹{{ $product->price }}</h5>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p>No products found for your search query.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
