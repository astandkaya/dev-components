@extends("layouts.admin.default")

@section("title", "検証用")

@section("content")
<div class="d-flex flex-column gap-4 ps-2">
  <div class="w-50">
    <h3>select2</h3>
    {{-- 通常 --}}
    <label for="ex-select2">通常</label>
    <select id="ex-select2" class="js-select2" data-placeholder="選択してください">
      <option></option>
      <option value="1">オプション1</option>
      <option value="2">オプション2</option>
      <option value="3">オプション3</option>
    </select>
    {{-- ajax --}}
    <label for="ex-select2-ajax">ajax</label>
    <select id="ex-select2-ajax" class="js-select2-ajax" data-placeholder="選択してください" data-fetch-url="{{ route('api.admin.select2.admins') }}">
      <option></option>
    </select>
  </div>

  <div>
    <h3>モーダル</h3>
    @php
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
    {{-- 削除 --}}
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
  </div>
</div>
@endsection
