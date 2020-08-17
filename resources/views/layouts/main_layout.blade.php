<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel-Vue</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d773f239a3.js" crossorigin="anonymous"></script>
    <script src="/js/app.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>

    <div class="header">
      @include('components.header')
    </div>
    <div class="main">
      <div id="app">
        @yield('content')
      </div>
    </div>
    <div class="footer">
      @include('components.footer')
    </div>

  </body>
</html>
