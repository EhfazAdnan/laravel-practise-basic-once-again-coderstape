@extends('layout')

@section('title')
   Add New Customer
@endsection

{{-- @section('title','Contact Us') --}} 

@section('content')
<div class="row">
   <div class="col-12">
      <h6>Add New Customer</h6>   
   </div>
</div>

<div class="row">
   <div class="col-12">
      <form action="/customers" method="POST">
        
        @include('customers.form')

        <button type="submit" class="btn btn-primary">Add Customer</button>
      </form>
   </div>
</div>

@endsection