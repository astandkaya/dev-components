@extends('layouts.admin.guest')

@section('title', 'ログイン')

@section('content')
  <div class="card-header text-center">
    <h2>{{ config('app.name') }}管理</h2>
  </div>

  <div class="card-body">
    <form method="POST" action="{{ route('admin.login') }}">
      @csrf

      <div class="input-group mb-3">
        <input type="email" name="email" placeholder="メールアドレス" class="form-control" value="{{ old('email') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="bi bi-envelope-fill"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="password" placeholder="パスワード" class="form-control" value="{{ old('password') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="bi bi-lock-fill"></span>
          </div>
        </div>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">ログイン</button>
        </div>
      </div>
    </form>

    @if ($errors->isNotEmpty())
      @foreach ($errors->unique() as $error)
        <p class="login-box-msg py-2 text-danger">{{ $error }}</p>
      @endforeach
    @endif
  </div>
@endsection
