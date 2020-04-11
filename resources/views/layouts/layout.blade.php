<!DOCTYPE html>
<html>

<head>
  <title>{{fullTitle($title)}}</title>
  @include('layouts.laravel_default')
  @include('layouts.shim')
</head>

<body>
  @include('layouts.header')
  <div class="container">
    @yield('content')
    @include('layouts.footer')
  </div>
</body>

</html>