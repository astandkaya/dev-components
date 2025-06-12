<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @hasSection('title')
        @yield('title') | 
      @endif
      {{ config('app.name') }}
    </title>

    <x-admin.libs />
    
    @stack('page-styles')
  </head>

  <body class="login-page">
    <div class="login-box">
      <div class="card card-outline card-primary">
        @yield('content')
      </div>
    </div>
  </body>

  @stack('page-scripts')
</html>
