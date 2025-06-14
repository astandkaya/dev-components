@if (!empty(trim($inputs)))
  <div @class([
    'card card-outline card-primary',
    'collapsed-card' => empty(array_filter(request()->except('page'))),
  ])>
    <div class="card-header" role="button" data-card-widget="collapse" data-expand-icon="bi-chevron-down" data-collapse-icon="bi-chevron-up">
      <h3 class="card-title">
        <i class="bi bi-search"></i>
        絞り込み
      </h3>
      <div class="card-tools">
        <button type="button" class="btn py-0 btn-tool" data-card-widget="collapse">
          <i
            @class([
              'fs-3 bi',
              'bi-chevron-down' => empty(array_filter(request()->except('page'))),
              'bi-chevron-up'   => !empty(array_filter(request()->except('page'))),
            ])></i>
        </button>
      </div>
    </div>
    <div class="card-body" @style([
      // フォーム開閉の動きをするときにBootstrapがdisplayを直接変更しているため、d-noneではなくdisplay: none;を指定する
      "display: none;" => empty(array_filter(request()->except('page')))
    ])>
      <form {{ $attributes }}>
        <div id="search-form-body">
          <div class="accordion-body">
            <div class="container d-flex flex-column gap-3">
              {{ $inputs }}
            </div>
          </div>
        </div>
        <div class="mt-3 text-end">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> 検索
          </button>
        </div>
      </form>
    </div>
  </div>
@endif
