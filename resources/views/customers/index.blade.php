@extends('layouts.app')

@section('title')
   Customer List Page
@endsection

{{-- @section('title','Contact Us') --}} 

@section('content')
<div class="row">
   <div class="col-12">
      <h6>Customers List</h6>
      <p><a href="customers/create">Add New Customer</a></p>   
   </div>
</div>

@foreach($customers as $customer)
     <div class="row">
         <div class="col-2">
             {{ $customer->id }}
         </div>
         <div class="col-4">
            <a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a>
         </div>
         <div class="col-4">{{ $customer->company->name }}</div>
         <div class="col-2">{{ $customer->active }}</div>
     </div>
@endforeach

@endsection