<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Styling using element-ui css framework which is compiled via element-ui js -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css"> -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

   @yield('content')

   <!-- Some larevel state info for JS -->

   @yield('scripts')

</body>
</html>
