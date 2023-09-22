<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom-font.css') }}">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">

    <link rel="stylesheet" href="../sidebar-04/css/style.css">
    <style>
        .body{
            style="font-family: 'BeinArNormal', sans-serif;">
        }
    </style>
    <title>@yield('title')</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body style="font-family: 'BeinArNormal', sans-serif; " >
    <!-- Include your sidebar template here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">  </a>
      
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





    @include('sidebar-04.index')
    

    <div id="content" style="background-color: rgb(232, 243, 255)">
        @yield('content')
    </div>
   

    <!-- Include your JavaScript files here -->
</body>
</html>