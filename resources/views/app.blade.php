<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16" /> --}}

  <script src="https://use.fontawesome.com/19d2f842d5.js"></script>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
  <body>
    <div id="app" class="container body">
      <router-view></router-view>
    </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
