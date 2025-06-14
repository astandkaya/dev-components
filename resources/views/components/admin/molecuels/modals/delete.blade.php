<div class="modal fade" id="js-delete-modal" tabindex="-1" aria-hidden="true" aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">削除確認</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
      </div>
      <div class="modal-body">
        <p>
          <span id="js-delete-target" class="fw-bolder"></span>を削除します。
        </p>
        
        <table id="js-delete-target-json" class="table table-bordered table-sm table-striped table-hover">
        </table>

        <p>
          本当によろしいですか？
        </p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
        <form action="" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">削除する</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('page-scripts')
  <script>
    $(() => {
      $('#js-delete-modal').on('show.bs.modal', function (e) {
          const $related_target = $(e.relatedTarget);
          const href = $related_target.data('href');
          const target = $related_target.data('target');
          const jsonData = $related_target.data('target-json');

          $(this).find('form').attr('action', href);
          $('#js-delete-target').text(target);
          $('#js-delete-target-json').empty();
          $.each(jsonData, function (key, value) {
              $('#js-delete-target-json').append(
                  `<tr>
                      <th class="text-nowrap">${key}</th>
                      <td>${value ?? ''}</td>
                  </tr>`
              );
          });
      });
    });
  </script>
@endpush
