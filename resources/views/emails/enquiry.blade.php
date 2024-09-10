<!DOCTYPE html>
<html>
<head>
    <title>Product Enquiry</title>
</head>
<body>
    <h1>New Product Enquiry</h1>
    <p>Dear {{ $seller->name }},</p>
    <p>You have received a new enquiry for your product.</p>
    <p><strong>Product Name:</strong> {{ $productName }}</p>
    <p><strong>Quantity:</strong> {{ $quantity }}</p>
    <p><img src="{{ asset('uploads/' . $productImage) }}" alt="{{ $productName }}" width="200"></p>
    <p><strong>Buyer Details:</strong></p>
    <ul>
        <li>Name: {{ $enquiry->name }}</li>
        <li>Email: {{ $enquiry->email }}</li>
        <li>Phone Number: {{ $enquiry->phone_number }}</li>
        <li>Address: {{ $enquiry->address }}</li>
    </ul>
</body>
</html>
