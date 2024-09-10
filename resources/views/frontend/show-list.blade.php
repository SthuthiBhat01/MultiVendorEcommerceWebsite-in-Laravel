<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssfile/bookStore.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show List</title>
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
        .offer-tag {
    font-size: 0.9rem;
    color: #d9534f; /* Offer color */
    font-weight: bold;
    display: block;
    margin-top: 5px;
}

.original-price {
    text-decoration: line-through;
    color: #888;
    font-size: 1rem;
}

.offer-price {
    color: #f10a0a;
    font-size: 1.4rem;
    font-weight: bold;
}

        .subcategory-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #612a2a; /* Adjust color as per your design */
        }
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
        .dropdown-menu {
            max-height: none !important; /* Remove max-height restriction */
            overflow-y: auto; /* Enable scrolling if necessary */
            min-height: 100px; /* Ensure minimum height */
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
    </style>
</head>
<body class="listar-home listar-hometwo">
    <div class="preloader-outer">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <div id="listar-wrapper" class="listar-wrapper listar-haslayout">
        <header id="listar-header" class="listar-header cd-auto-hide-header listar-haslayout">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
                        <strong class="listar-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/logod.png') }}" alt="Company Logo">
                            </a>
                        </strong>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
                        <div class="search-bar">
                            <form class="header-item-search" method="GET" action="{{ route('searchProducts') }}">
                                <div class="input-group search-input">
                                    <div class="dropdown bootstrap-select default-select">
                                        <select class="default-select" name="category_id">
                                            <option value="">All Categories</option>
                                            @foreach ($groupedCategories as $category)
                                                <optgroup label="{{ $category['main']->name }}">
                                                    @foreach ($category['subcategories'] as $subcategory)
                                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="search" class="form-control" name="query" placeholder="Search Product">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

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
                    <div class="site-filters clearfix style-1 align-items-center">
                        <ul class="filters" data-bs-toggle="buttons">
                            <li class="btn active" data-filter="all">
                                <input type="radio">
                                <a href="javascript:void(0);">ALL</a> 
                            </li>
                            @foreach($groupedCategories as $group)
                                <li class="btn" data-filter="{{ $group['main']->id }}">
                                    <input type="radio">
                                    <a href="javascript:void(0);">{{ $group['main']->name }}</a> 
                                </li>
                            @endforeach
                        </ul>         
                    </div>
                </div>
            </div>

            <div class="clearfix">
                <div id="product-container">
                    @foreach($groupedCategories as $group)
                    <div class="category-products" data-category="{{ $group['main']->id }}">
                        @foreach($group['subcategories'] as $subcategory)
                            @if($subcategory->products->isNotEmpty())
                                <h3>{{ $subcategory->name }}</h3>
                                <ul class="row g-xl-4 g-3">
                                    @foreach($subcategory->products as $product)
                                        <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                            <div class="shop-card">
                                                <div class="dz-media">
                                                    <img src="{{ asset('uploads/' . $product->image) }}" alt="Product" height="200">
                                                    <div class="shop-meta">
                                                        <a href="{{ route('viewDetails', ['productId' => $product->id]) }}" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="fa-solid fa-eye d-md-none d-block"></i>
                                                            <span class="d-md-block d-none">View Detail</span>
                                                        </a>
                                                    </div>                          
                                                </div>
                                                <div class="dz-content">
                                                    <h5 class="title"><a href="{{ route('viewDetails', ['productId' => $product->id]) }}">{{ $product->name }}</a></h5>
                                                    <h5 class="price">
                                                        @if($product->offers->isNotEmpty())
                                                            <!-- Assuming you want to show only the first offer -->
                                                            @php
                                                                $offer = $product->offers->first();
                                                                $discountedPrice = $product->price - ($product->price * $offer->discount_percentage / 100);
                                                            @endphp
                                                            <span class="original-price">₹{{ $product->price }}</span>
                                                            <span class="offer-price">₹{{ $discountedPrice }}</span>
                                                            <span class="offer-tag">{{ $offer->offer_name }} ({{ $offer->discount_percentage }}% OFF)</span>
                                                        @else
                                                            ₹{{ $product->price }}
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterButtons = document.querySelectorAll('.filters .btn');
            const productContainers = document.querySelectorAll('.category-products');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filter = button.getAttribute('data-filter');

                    productContainers.forEach(container => {
                        if (filter === 'all' || container.getAttribute('data-category') === filter) {
                            container.style.display = 'block';
                        } else {
                            container.style.display = 'none';
                        }
                    });

                    // Update active class on filter buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
