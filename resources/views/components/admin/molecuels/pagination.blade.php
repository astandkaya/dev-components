@if ($contents instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
  <div class="col-12 mb-3">
    {{ $contents->appends(request()->query())->links() }}
  </div>
@endif