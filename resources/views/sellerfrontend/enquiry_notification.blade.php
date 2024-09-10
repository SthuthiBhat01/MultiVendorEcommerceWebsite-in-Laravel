@extends('sellerfrontend.layouts.main')

@section('main-container')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style>
    .enquiry-row {
        border-bottom: 1px solid #dee2e6; /* Light grey border */
        padding: 24px 0; /* Padding above and below each row */
    }
    .enquiry-row:last-child {
        border-bottom: none; /* Remove border from the last row */
    }
    .enquiry-email {
        font-weight: bold;
        color: #007bff;
        font-size: 1.8rem; /* Bootstrap primary color */
    }
    .enquiry-time {
        color: #6c757d; /* Secondary text color */
        font-size: 1.8rem; /* Slightly smaller font size */
    }
    span{
        font-size:1.8rem;
    }
</style>



<main id="listar-main" class="listar-main listar-innerspeace listar-haslayout">
    <div class="container">
        @if ($enquiries->isEmpty())
            <div class="alert alert-info" role="alert">
                You have no enquiries at the moment.
            </div>
        @else
            @foreach ($enquiries as $enquiry)
                <div class="row enquiry-row">
                    <div class="col-12">
                        <span>You have got an enquiry from <span class="enquiry-email">{{ $enquiry->email }}</span>
                        <br>
                        <span><img style="height: 80px; width: 80px;" 
                            src="{{ asset('uploads/' . $enquiry->product->image) }}" 
                            alt="Product Image" /><br>
                            <b>Product name:</b>{{ $enquiry->product->name }}</span>
                        <br>
                        <span><b>Phoneno:</b>{{ $enquiry->phone_number }}</span>
                        <br>
                        <span><b>Address:</b>{{ $enquiry->address }}</span>

                        <span class="float-right enquiry-time">Time: {{ $enquiry->created_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</main>

@endsection
