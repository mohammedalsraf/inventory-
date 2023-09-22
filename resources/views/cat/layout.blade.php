<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" href="../sidebar-04/css/style.css">
    <title>@yield('title')</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body>
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
    <script>
        function doubleConfirm() {
            if (confirm('هل انت متاكد انك تريد حذف هذا الصنف سيتم حذف جميع المواد الموجودة ضمن هذا الصنف')) {
                // If the user confirms the first dialog, show a second confirmation
                return confirm('اذا قمت بحذف الصنف سيتم ازالة جميع المواد الموجودة ضمن الصنف ولا يمكن التراجع عن هذه الخطوه');
            }
            return false; // If the user cancels the first dialog, do not proceed with the delete.
        }
    </script>

    <!-- Include your JavaScript files here -->
</body>
</html>