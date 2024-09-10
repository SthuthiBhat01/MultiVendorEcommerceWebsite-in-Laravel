@extends('adminfrontend.layouts.main')

@section('main-container')


<h3>Contact Details</h3>
<br>
<table class="table table-bordered">
    <thead>
        <th>S.no</th>
        <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Created Date</th>
    </thead>
    <tbody>
        @php
        $counter = 1;
        @endphp
        @foreach($contacts as $contact)
        <tr>
            <td>{{$counter++}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->message}}</td>
            <td>{{$contact->created_at->format('d-m-Y')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>{{$contacts->links()}}</h2>




@endsection