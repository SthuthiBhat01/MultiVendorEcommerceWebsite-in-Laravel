@extends('sellerfrontend.layouts.main')

@section('main-container')
<div class="container">
    <h1>Add Offer for {{ $product->name }}</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <img src="{{ asset('uploads/' . $product->image) }}" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-8">
            <h4>Price: <span id="original-price">{{ $product->price }}</span></h4>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('offers.store', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="offer_name">Offer Name</label>
            <input type="text" class="form-control" id="offer_name" name="offer_name" value="{{ old('offer_name') }}" required>
        </div>
        <div class="form-group">
            <label for="discount_percentage">Discount Percentage</label>
            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage') }}" step="0.01" min="0" max="100" required oninput="calculateDiscountedPrice()">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
        </div>
        <div class="form-group">
            <label>Discounted Price</label>
            <h4 id="discounted-price">{{ $product->price }}</h4>
        </div>
        <button type="submit" class="btn btn-primary">Add Offer</button>
    </form>
</div>

<script>
    function calculateDiscountedPrice() {
        const originalPrice = parseFloat(document.getElementById('original-price').innerText);
        const discountPercentage = parseFloat(document.getElementById('discount_percentage').value);
        if (!isNaN(discountPercentage)) {
            const discountedPrice = originalPrice - (originalPrice * (discountPercentage / 100));
            document.getElementById('discounted-price').innerText = discountedPrice.toFixed(2);
        } else {
            document.getElementById('discounted-price').innerText = originalPrice.toFixed(2);
        }
    }
</script>
@endsection
