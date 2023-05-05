      <!-- Modal -->
      <div class="modal fade" id="tambah<?= $data['controllerName']?>Modal" tabindex="-1" role="dialog" aria-labelledby="tambah<?= $data['controllerName']?>ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah<?= $data['controllerName']?>ModalLabel">Tambah <?= $data['controllerName']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/<?= $data['controllerName'] ?>/tambah" method="post">
            <?php foreach($data['columns'] as $column): ?>
                <div class="form-group">
                    <label for="<?= $column['columnName']; ?>"><?= $column['displayName']; ?></label>
                    <input type="<?= $column['type']; ?>" class="form-control" id="<?= $column['columnName']; ?>" name="<?= $column['columnName']; ?>" placeholder="<?= $column['displayName']; ?>">
                </div>

            <?php endforeach; ?>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>