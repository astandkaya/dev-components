<aside class="main-sidebar sidebar-light-primary elevation-1 position-fixed min-vh-100 d-flex flex-column justify-content-between">
  <div>
    <a href="/" class="brand-link">
      {{ config('app.name') }}
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
          @foreach ($items as $key => $item)
            @if ($item['hidden'] ?? false)
              @continue
            @endif
            @empty ($item['children'])
              <li class="nav-item">
                <a href="{{ $item['link'] }}" @class([
                  "nav-link",
                  "active" => $item['link'] === $currentPath,
                ])>
                  <i class="nav-icon bi {{ $item['icon'] }} fs-6"></i>
                  <p>{{ $item['name'] }}</p>
                </a>
              </li>
            @else
              <li @class([
                "nav-item",
                "menu-open" => in_array($currentPath, array_column($item['children'], 'link'), true),
              ])>
                <a href="#" @class([
                  "nav-link",
                ])>
                  <i class="nav-icon bi {{ $item['icon'] }} fs-6"></i>
                  <p>
                    {{ $item['name'] }}
                    <i class="right bi bi-caret-left-fill"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  @foreach ($item['children'] as $child)
                    @if ($child['hidden'] ?? false)
                      @continue
                    @endif
                    <li class="nav-item">
                      <a href="{{ $child['link'] }}" @class([
                        "nav-link",
                        "active" => $child['link'] === $currentPath,
                      ])>
                        <i class="nav-icon bi {{ $child['icon'] }} fs-6"></i>
                        <p>{{ $child['name'] }}</p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            @endempty
          @endforeach
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
