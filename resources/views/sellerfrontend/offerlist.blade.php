<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products with Offers</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .card {
            border: none; /* Remove default border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
            transition: box-shadow 0.3s ease; /* Smooth transition */
        }
        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
        }
        .card-img-top {
            height: 200px; /* Fixed height for product images */
            object-fit: cover; /* Maintain aspect ratio */
            border-top-left-radius: 8px; /* Rounded top-left corner */
            border-top-right-radius: 8px; /* Rounded top-right corner */
        }
        .card-body {
            padding: 1.25rem; /* Padding inside the card body */
        }
        .card-title {
            font-size: 1.25rem; /* Larger title font size */
            font-weight: bold; /* Bold text */
            margin-bottom: 0.75rem; /* Bottom margin for spacing */
        }
        .card-text {
            font-size: 1rem; /* Normal text size */
            margin-bottom: 0.5rem; /* Bottom margin for spacing */
        }
        .mb-4 {
            margin-bottom: 2rem !important; /* Larger bottom margin for the heading */
        }
        .delete-btn {
            color: #dc3545; /* Red color for delete button */
            cursor: pointer; /* Pointer cursor on hover */
        }
        .delete-btn:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mt-4 mb-2">
            <a href="{{ route('sellerpage') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
        <h1 class="mb-4">Products with Offers</h1>
        @if ($products->isEmpty())
            <div class="alert alert-info">
                There are no offers set by you for your products.
                <a href="{{ route('sellerlisting') }}" class="btn btn-primary ml-2">Add Offers</a>
            </div>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border">
                            <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Category: {{ $product->category->name }}</p>
                                <p class="card-text">Original Price: ₹{{ $product->price }}</p>
                                @forelse($product->offers as $offer)
                                    <hr>
                                    <p class="card-text">Offer: {{ $offer->offer_name }}</p>
                                    <p class="card-text">Discount: {{ $offer->discount_percentage }}%</p>
                                    <p class="card-text">Discounted Price: ₹{{ $offer->discounted_price }}</p>
                                    <p class="card-text">Valid From: {{ $offer->start_date }} to {{ $offer->end_date }}</p>
                                    <form action="{{ route('offers.delete', $offer->offerid) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                @empty
                                    <div class="alert alert-warning">
                                        No offers set for this product.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Bootstrap JS (Optional for Bootstrap features) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
