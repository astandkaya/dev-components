@extends("layouts.admin.default")

@section("title", "Developments - Molecuels")

@section("content")
@php
  $admins = \App\Models\Admin::paginate(3);
  $modal_json_data = [
    'ID' => 1,
    '説明' => '削除対象の説明',
    '作成日' => now()->format('Y-m-d'),
    '更新日' => now()->format('Y-m-d'),
    'その他' => [
      '詳細1' => '詳細情報1',
      '詳細2' => '詳細情報2',
      '詳細3' => '詳細情報3',
    ],
  ];
@endphp

<div class="d-flex flex-column gap-4 ps-2">
  {{-- 各種モーダル --}}
  <h3>Modals</h3>
  <div>
    <a
      class="btn btn-danger"
      data-href="#"
      data-target="削除対象の名前"
      data-target-json='@json($modal_json_data)'
      data-bs-toggle="modal"
      data-bs-target="#js-delete-modal"
    >
      <i class="bi bi-trash"></i> 削除
    </a>
    <a href="#"
      class="btn btn-info"
      data-title="情報詳細"
      data-json-data='@json($modal_json_data)'
      data-bs-toggle="modal"
      data-bs-target="#js-information-modal"
    >
      <i class="bi bi-info-circle"></i> 詳細
    </a>
  </div>

  {{-- 絞り込みフォーム（一覧画面用） --}}
  <h3>Search Form</h3>
  <x-admin.molecuels.search-form>
    <x-slot:inputs>
      <div class="col-12 col-sm-6">
        <label for="name" class="form-label">name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ request()->input('name') }}">
      </div>
      <div class="col-12 col-sm-6">
        <label for="company" class="form-label">company</label>
        <select id="company" name="company" class="form-select">
          <option value="">全て</option>
          <option value="1" @selected(request()->input('company') === '1')>hoge</option>
          <option value="2" @selected(request()->input('company') === '2')>fuga</option>
        </select>
      </div>
    </x-slot>
  </x-admin.molecuels.index.search-form>
</div>
@endsection
