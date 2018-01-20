<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

  </head>
<!-- NAVBAR
================================================== -->
  <body>

      <div class="container" style="min-width: 480px; max-width: 780px; background: #fff; ">

        <div class="header" style="height:80px; background: #3a5f95">
            <img src="{{ asset('images/logo.jpeg') }}" style="float:left"/>
            <div style="float:right;font-size:24px;color: white;margin-right: 10px; margin-top:5px">1800 123 456</div>
        </div>



        @include('layouts.partials.navbar')
        <div id="content-wrapper">
            <a name="top"></a>
            @yield('content')
        </div>

        @include('layouts.partials.footer')

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

    @yield('scripts')
  </body>
</html>
