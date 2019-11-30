<h5>Customers page</h5>

<ul>
   @foreach($customers as $customer)
   <li>{{ $customer }}</li>
   @endforeach
</ul>