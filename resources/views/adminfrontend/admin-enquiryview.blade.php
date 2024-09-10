@extends('adminfrontend.layouts.main')

@section('main-container')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">




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

                <hr>
            @endforeach
        @endif
    </div>
</main>

@endsection
