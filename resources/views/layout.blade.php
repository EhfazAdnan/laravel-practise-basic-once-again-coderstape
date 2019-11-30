<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>

        <ul class="nav">
            <li class="nav-item">
               <a href="/" class="nav-link active">Home</a>
            </li>

            <li class="nav-item">
               <a href="/about" class="nav-link active">About Us</a>
            </li>

            <li class="nav-item">
               <a href="/contact" class="nav-link active">Contact Us</a>
            </li>

            <li class="nav-item">
               <a href="/customers" class="nav-link active">Our Customers</a>
            </li>
        </ul>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
