<!DOCTYPE html>
<html>

<head>
  <title>{{fullTitle($title)}}</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href={{ asset('/css/app.css') }}>
  <script src={{'/js/app.js'}} defer></script>
</head>

<body>
  @yield('content')
</body>

</html>