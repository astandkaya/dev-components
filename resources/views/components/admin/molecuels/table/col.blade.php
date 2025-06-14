<div
  @class([
    'col d-flex',
    $class ?? null,
  ])
  {{ $attributes->except([
    'class',
  ]) }}
>
  <span class="d-md-none fw-bold pe-2">{{ $title ?? '' }}</span>
  <span>{{ $content }}</span>
</div>