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

  <body>
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" data-widget="pushmenu" href="#"><i class="bi bi-list fs-2"></i></a>
          </li>
        </ul>
      </nav>

      <aside class="main-sidebar sidebar-light-primary elevation-1 position-fixed min-vh-100 d-flex flex-column justify-content-between">
        <div>
          <a href="/" class="brand-link">
            {{ config('app.name') }}
          </a>
          <div class="sidebar">
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
              </ul>
            </nav>
          </div>
        </div>
        <div class="mb-4 px-4">
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <input class="btn btn-secondary btn-block" type="submit" value="ログアウト">
          </form>
        </div>
      </aside>

      <div class="content-wrapper bg-white">
        <section class="content-header">
          <div class="container-fluid">
            
          </div>
        </section>
        <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
      </div>
    </div>
  </body>

  @stack('page-scripts')
</html>
