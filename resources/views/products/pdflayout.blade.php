<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
   


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 
    <style>
        .body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 15px ;
            direction: rtl;
            text-align: right;
            float: right;
            background-color: rgb(240, 240, 240)
           
        }
   
    </style>
   

</head>
<body   >

    <div id="content"  class="body ">
        @yield('content')
    </div>


</body>
</html>