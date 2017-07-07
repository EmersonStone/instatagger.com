<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="Get more traction on your Instagram photos with none of the work">
	<meta name="keywords" content="Tagnum P.I. sleuths out relevant hashtags based on the content in your photos and adds them automatically to save you time!">

  <meta property="og:type" content="website">
	<meta property="og:url" content="https://tagnumpi.com/">
	<meta property="og:title" content="Get more traction on your Instagram photos with none of the work">
	<meta property="og:description" content="Tagnum P.I. sleuths out relevant hashtags based on the content in your photos and adds them automatically to save you time!">
	<meta property="og:image" content="https://tagnumpi.com/images/social-image.jpg">
	<meta property="og:image:secure_url" content="https://tagnumpi.com/images/social-image.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:type" content="image/jpg">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script type="text/javascript">
    window.tagnumpi = window.tagnumpi || {};
    @if(Auth::user())
      window.tagnumpi.user = {!! json_encode(\Auth::user()) !!};
    @endif
  </script>

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16" />

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
  <body>
    <div id="app">
      <router-view></router-view>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
