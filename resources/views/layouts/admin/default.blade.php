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

    <x-admin.organisms.libs />
    
    @stack('page-styles')
  </head>

  <body>
    <div class="wrapper">
      <x-admin.organisms.header />

      <x-admin.organisms.sidebar />

      <div class="content-wrapper bg-white">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>@yield("title")</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
      </div>
    </div>

    <x-admin.modals.delete />
  </body>

  @stack('page-scripts')
</html>
