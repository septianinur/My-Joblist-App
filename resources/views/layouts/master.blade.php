
<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <link rel="icon" href="../../favicon.ico"> --}}
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    {{-- <link href="{{asset('css/master.css')}}" rel="stylesheet"> --}}

  </head>
  <body>

    @include('shared.header')

    <!-- Begin page content -->
        @yield('content')

    {{-- @include('shared.footer') --}}


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
