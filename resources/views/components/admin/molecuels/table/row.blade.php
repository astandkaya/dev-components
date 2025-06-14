{{-- PC --}}
<div
  @class([
    'row flex-md-row d-none d-md-flex align-items-center border-bottom m-0 p-2',
    "row-cols-{$colCount}",
    $class ?? null,
  ])
  {{ $attributes->except([
    'colCount',
    'class',
  ]) }}
>
  {{ $slot }}
</div>

{{-- SP --}}
@empty($isHeader)
  <div
    @class([
      'row flex-md-row d-flex d-md-none flex-column align-items-center border-bottom m-0 p-2',
      $class ?? null,
    ])
    {{ $attributes->except([
      'class',
    ]) }}
  >
    {{ $slot }}
  </div>
@endempty