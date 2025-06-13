<div {{ $attributes }}>
  <div class="mb-3 d-flex justify-content-between">
    <div class="d-flex gap-3">
      {{ $left ?? null }}
    </div>
    <div class="d-flex gap-3">
      {{ $center ?? null }}
    </div>
    <div class="d-flex gap-3">
      {{ $right ?? null }}
    </div>
  </div>
</div>
