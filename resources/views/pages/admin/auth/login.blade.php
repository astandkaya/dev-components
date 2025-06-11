<form method="POST" action="{{ route('admin.login') }}">
  @csrf
  <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
  <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}">
  <input type="submit" value="ログイン">
</form>

@if ($errors->isNotEmpty())
  <ul>
    @foreach ($errors->unique() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
