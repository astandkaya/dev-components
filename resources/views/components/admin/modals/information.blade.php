<div class="modal fade" id="js-information-modal" tabindex="-1" aria-hidden="true" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="js-information-title" class="modal-title fw-bold"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
      </div>
      <div class="modal-body">
        <table id="js-json-data" class="table table-bordered table-sm table-striped table-hover">
        </table>
      </div>
    </div>
  </div>
</div>

@push('page-scripts')
  <script>
    $(() => {
      $('#js-information-modal').on('show.bs.modal', function (e) {
          const $related_target = $(e.relatedTarget);
          const title = $related_target.data('title');
          const jsonData = $related_target.data('json-data');

          $('#js-information-title').text(title);
          $('#js-json-data').empty();
          $.each(jsonData, function (key, value) {
            let trs = [];

            if (typeof value === 'object' && !Array.isArray(value)) {
              trs.push($('<tr>').append($('<th class="text-nowrap text-center bg-light" colspan="2">').text(key)));
              
              $.each(value, function (subKey, subValue) {
                trs.push($('<tr>').append($('<th class="text-nowrap">').text(subKey), $('<td>').html(subValue)));
              });
            } else {
              trs.push($('<tr>').append($('<th class="text-nowrap">').text(key), $('<td>').html(value)));
            }

            $('#js-json-data').append(trs);
          });
      });
    });
  </script>
@endpush
