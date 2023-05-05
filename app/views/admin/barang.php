  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::flash();
          ?>
        </div>
      </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> 
          <a href="#" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#tambah<?= $data['controllerName'] ?>Modal">Tambah Barang</a>
        </div>
        <div class="card-body">
        
      <form action="<?= BASEURL; ?>/user/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= BASEURL; ?>/user" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>keterangan</th>
                      <th>Satuan</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['barang'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['IdBarang'];?></td>
                      <td><?= $row['NamaBarang'];?></td>
                      <td><?= $row['Keterangan'];?></td>
                      <td><?= $row['Satuan'];?></td>
                      <td>
                        <a href="#" class="badge badge-info edit-btn" data-toggle="modal" data-target="#editModal" data-id="<?= $row['IdBarang'] ?>">Edit</a>
                        <a href="<?= BASEURL; ?>/barang/hapus/<?= $row['IdPengguna'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" action="<?= BASEURL; ?>/barang/edit" method="post">
        <div class="modal-body">
          <input type="hidden" name="id_barang" id="edit_id_barang">
          <div class="form-group">
            <label for="edit_nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="edit_nama_barang" name="nama_barang" required>
          </div>
          <div class="form-group">
            <label for="edit_keterangan">Keterangan</label>
            <textarea class="form-control" id="edit_keterangan" name="keterangan"></textarea>
          </div>
          <div class="form-group">
            <label for="edit_satuan">Satuan</label>
            <input type="text" class="form-control" id="edit_satuan" name="satuan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
      var id_barang = $(this).data('id');
      $.ajax({
        url: "<?= BASEURL; ?>/barang/getById",
        method: "POST",
        data: {
          id_barang: id_barang
        },
        dataType: "json",
        success: function(data) {
          $('#edit_id_barang').val(data.IdBarang);
          $('#edit_nama_barang').val(data.NamaBarang);
          $('#edit_keterangan').val(data.Keterangan);
          $('#edit_satuan').val(data.Satuan);
        }
      });
    });
  });
</script>
