<form method="POST" action="{{ route('admin.logout') }}">
  @csrf
  <input class="btn btn-secondary" type="submit" value="ログアウト">
</form>
