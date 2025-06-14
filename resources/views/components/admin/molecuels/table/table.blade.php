<div class="row">
  <div class="col-12">
    @if ($contents->isNotEmpty())
      <div class="card">
        <div class="card-body p-0 text-nowrap">
          {{ $slot }}
        </div>
      </div>
    @else
      <p class="mt-5 fs-5 text-center">
        {{ $emptyNotes ?? 'データが存在しません。' }}
      </p>
    @endif
  </div>
</div>
