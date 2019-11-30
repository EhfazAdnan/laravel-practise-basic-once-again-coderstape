@extends('layout')

@section('title')
   Customer List Page
@endsection

{{-- @section('title','Contact Us') --}} 

@section('content')
<div class="row">
   <div class="col-12">
      <h6>Customers List</h6>   
   </div>
</div>

<div class="row">
   <div class="col-12">
      <form action="customers" method="POST">
         @csrf
         <div class="form-group">
         <label for="name">Name</label>
            <input type="text" name="name" placeholder="Your name" value="{{ old('name') }}" class="form-control">
         </div>

         <div class="form-group">
         <label for="email">Email</label>
            <input type="text" name="email" placeholder="Your email" value="{{ old('email') }}" class="form-control">
         </div>

         <div>{{ $errors->first('name') }}</div>
         <div>{{ $errors->first('email') }}</div>

         <button type="submit" class="btn btn-primary">Add Customer</button>
      </form>
   </div>
</div>

<hr>

<div class="row">
   <div class="col-12">
      <ul>
         @foreach($customers as $customer)
         <li>{{ $customer->name }} - {{ $customer->email }}</li>
         @endforeach
      </ul>
   </div>
</div>
@endsection