@extends('layout')

@section('content')
<h5>Customers page</h5>

<ul>
   @foreach($customers as $customer)
   <li>{{ $customer->name }}</li>
   @endforeach
</ul>
@endsection