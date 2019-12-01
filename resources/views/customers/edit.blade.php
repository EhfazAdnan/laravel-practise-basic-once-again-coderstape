@extends('layouts.app')

@section('title')
  Edit Details Customer
@endsection

{{-- @section('title','Contact Us') --}} 

@section('content')
<div class="row">
   <div class="col-12">
      <h6>Edit Customer Information - {{ $customer->name }}</h6>   
   </div>
</div>

<div class="row">
   <div class="col-12">
      <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
        
        @method('PATCH')
        @include('customers.form')

        <button type="submit" class="btn btn-primary">Save Customer</button>
      </form>
   </div>
</div>

@endsection