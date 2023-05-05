<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit <?= ucfirst($data['controllerName'])?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" action="<?= BASEURL; ?>/<?= $data['controllerName']; ?>/edit" method="post">
        <div class="modal-body">
          <input type="hidden" name="Id<?= ucfirst($data['controllerName'])?>" id="editId<?= ucfirst($data['controllerName'])?>">
            <?php foreach($data['columnsEdit'] as $column): ?>
                <div class="form-group">
                    <label for="edit<?= $column['columnName']; ?>"><?= $column['displayName']; ?></label>
                    <input type="<?= $column['type']; ?>" class="form-control" id="edit<?= $column['columnName']; ?>" name="<?= $column['columnName']; ?>" placeholder="<?= $column['displayName']; ?>">
                </div>

            <?php endforeach; ?>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
      var id = $(this).data('id');
      
      $.ajax({
        url: "<?= BASEURL; ?>/<?= $data['controllerName'] ?>/getByIdJsonReturn",
        method: "POST",
        data: {
          id: id
        },
        dataType: "json",
        success: function(data) {
          console.log("Hai");
          $('#editId<?= ucfirst($data['controllerName']); ?>').val(data.Id<?= ucfirst($data['controllerName']); ?>);
          <?php foreach($data['columnsEdit'] as $column): ?>
            $('#edit<?= $column['columnName']; ?>').val(data.<?= $column['columnName']; ?>);
          <?php endforeach; ?>
        }
      });
    });
  });
</script>