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
            <div>{{ $errors->first('name') }}</div>
         </div>

         <div class="form-group">
         <label for="email">Email</label>
            <input type="text" name="email" placeholder="Your email" value="{{ old('email') }}" class="form-control">
            <div>{{ $errors->first('email') }}</div>
         </div>

         <div class="form-group">
         <label for="active">Status</label>
            <select name="active" id="active" class="form-control">
               <option value="" disabled>Select Customer Status</option>
               <option value="1">Active</option>
               <option value="0">Inactive</option>
            </select>
         </div>

         <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
               @foreach($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
               @endforeach
            </select>
         </div>

         <button type="submit" class="btn btn-primary">Add Customer</button>
      </form>
   </div>
</div>

<hr>

<div class="row">
   <div class="col-6">
   <h6>Active Customers</h6>
      <ul>
         @foreach($activeCustomers as $active)
         <li>{{ $active->name }} - {{ $active->email }}</li>
         <li>{{ $active->company->name }}</li>
         @endforeach
      </ul>
   </div>

   <div class="col-6">
   <h6>Active Customers</h6>
      <ul>
         @foreach($inactiveCustomers as $inactive)
         <li>{{ $inactive->name }} - {{ $inactive->email }}</li>
         @endforeach
      </ul>
   </div>

   <div class="row">
      <div class="col-12">
         @foreach($companies as $company)
            <h6>{{ $company->name }}</h6>

            <ul>
               @foreach($company->customers as $customer)
                  <li>{{ $customer->name }}</li>
               @endforeach
            </ul>
         @endforeach
      </div>
   </div>

</div>
@endsection