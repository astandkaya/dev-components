@extends("layouts.admin.default")

@section("title", "Developments - Atoms")

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
    {{-- エラーメッセージ --}}
    <h3>error message</h3>
    <x-admin.atoms.error-message name="hoge" />
  </div>
</div>
@endsection
