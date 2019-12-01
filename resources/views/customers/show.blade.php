@extends('layouts.app')

@section('title')
   Show Customer Data
@endsection

{{-- @section('title','Contact Us') --}} 

@section('content')
<div class="row">
   <div class="col-12">
      <h6>Customer Informations {{ $customer->name }}</h6>   
      <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>
      <form action="/customers/{{ $customer->id }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-small" type="submit">Delete</button>
      </form>
   </div>
</div>

<div class="row">
   <div class="col-12">
       <p><strong>Name: </strong>{{ $customer->name }}</p>
       <p><strong>Email: </strong>{{ $customer->email }}</p>
       <p><strong>Company: </strong>{{ $customer->company->name }}</p>
   </div>
</div>

@endsection