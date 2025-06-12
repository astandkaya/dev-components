{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
{{-- adminlte --}}
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js" integrity="sha256-u2yoem2HtOCQCnsp3fO9sj5kUrL+7hOAfm8es18AFjw=" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" integrity="sha256-rhU0oslUDWrWDxTY4JxI2a2OdRtG7YSf3v5zcRbcySE=" crossorigin="anonymous">
{{-- bootstrap icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha384-XGjxtQfXaH2tnPFa9x+ruJTuLE3Aa6LhHSWRr1XeTyhezb4abCG4ccI5AkVDxqC+" crossorigin="anonymous">
{{-- override-bootstrap --}}
<link rel="stylesheet" href="{{ asset('css/override-bootstrap.css') }}">
{{-- toastr --}}
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js" defer></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" integrity="sha256-R91pD48xW+oHbpJYGn5xR0Q7tMhH4xOrWn1QqMRINtA=" crossorigin="anonymous">
<script>
  $(() => {
    toastr.options = {
      "progressBar": true,
    }
    @switch (true)
        @case (session('success'))
            toastr.success('{{ session('success') }}');
            @break
        @case (session('info'))
            toastr.info('{{ session('info') }}');
            @break
        @case (session('warning'))
            toastr.warning('{{ session('warning') }}');
            @break
        @case (session('error'))
            toastr.error('{{ session('error') }}');
            @break
    @endswitch
});
</script>
