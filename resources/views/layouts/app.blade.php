<!DOCTYPE html>
<html>
    <head>
        <title>Book List</title>
    </head>
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <body>
        <div class="container">
            <nav class="navbar navbar-default">

            </nav>
        </div>
        @yield('content')
    </body>
</html>