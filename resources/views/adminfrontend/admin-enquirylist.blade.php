@extends('adminfrontend.layouts.main')

@section('main-container')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>

    <h1>Enquiry List</h1>
    <table>
        <thead>
            <tr>
                <th>SellerID</th>
                <th>Product ID</th>
                
                <th>Product</th>
                <th>Seller</th>
                
                <th>Company Name</th>
                <th>Buyer Name</th>
                <th>Buyer Email</th>
                <th>Buyer Phone no</th>
                <th>Buyer Address</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enquiries as $enquiry)
                <tr>
                    <td>WIND24{{ $enquiry->seller_id ?? 'WIND2442' }}</td>
                    <td>{{ $enquiry->product->id }}</td>
                    
                    
                    <td>
                        <img style="height: 80px; width: 80px;" 
                             src="{{ asset('uploads/' . $enquiry->product->image) }}" 
                             alt="Product Image" /><br><span>{{ $enquiry->product->name }}</span>
                    </td>
                    <td>{{ $enquiry->seller->name }}</td>
                    
                    <td>{{ $enquiry->seller->company->company_name ?? 'N/A' }}</td>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->phone_number }}</td>
                    <td>{{ $enquiry->address }}</td>
                    <td>{{ $enquiry->quantity }}</td>
                    <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($enquiry->created_at)->format('H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
