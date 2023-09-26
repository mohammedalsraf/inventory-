<!doctype html>
<html lang="en" dir="rtl">
  <head>
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> -->
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('../css/custom-font.css') }}">
  </head>
  <body style="font-family: 'BeinArNormal', sans-serif;">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a class="logo text-center">نظام المخازن</a></h1>
        <ul class="list-unstyled components mb-5 text-right">
          <li class="{{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
            <a href="{{route('products.index')}}"><span class="fa fa-home mr-3 "></span> الرئيسية </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'products.create' ? 'active' : '' }}">
              <a href='{{route('products.create')}}'><span class="fa fa-plus-circle mr-3"></span> تعريف المواد </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'cat.create' ? 'active' : '' }}">
            <a href="{{route('cat.create')}}"><span class="fa fa-puzzle-piece mr-3"></span> اضافة صنف مادة </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'report' ? 'active' : '' }}">
            <a href="{{route('report')}}"><span class="fa fa-file-text-o mr-3"></span> تقرير حركة المخزن </a>
          </li>
          <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
            <a href="{{route('about')}}"><span class="fa fa-info-circle mr-3"></span> حول النظام </a>
          </li >
          
          {{-- <li class="me-3">
            <a href="#"><span class="fa fa-times-circle-o mr-3"></span> خروج </a>
          </li> --}}
        </ul>

    	</nav>

      

        <!-- Page Content  -->
 

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>