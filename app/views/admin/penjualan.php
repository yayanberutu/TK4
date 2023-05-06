  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Penjualan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-sm-12">
          <?php
            Flasher::message();
          ?>
        </div>
      </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> 
          <a href="#" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#tambah<?= $data['controllerName'] ?>Modal">Tambah Penjualan</a>
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
                      <th>Id Penjualan</th>
                      <th>Tanggal Penjualan</th>
                      <th>Jumlah Penjualan</th>
                      <th>Harga Jual</th>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Keterangan</th>
                      <th>Id Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat Pelanggan</th>
                      <th>No Hp Pelanggan</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['penjualan'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['IdPenjualan'];?></td>
                      <td><?= $row['TanggalPenjualan'];?></td>
                      <td><?= $row['JumlahPenjualan'];?></td>
                      <td><?= $row['HargaJual'];?></td>
                      <td><?= $row['IdBarang'];?></td>
                      <td><?= $row['NamaBarang'];?></td>
                      <td><?= $row['Satuan'];?></td>
                      <td><?= $row['Keterangan'];?></td>
                      <td><?= $row['IdPelanggan'];?></td>
                      <td><?= $row['NamaPelanggan'];?></td>
                      <td><?= $row['AlamatPelanggan'];?></td>
                      <td><?= $row['NoHpPelanggan'];?></td>
                      <td>
                        <a href="#" class="badge badge-info edit-btn" data-toggle="modal" data-target="#editModal" data-id="<?= $row['IdPenjualan'] ?>">Edit</a>
                        <a href="<?= BASEURL; ?>/penjualan/hapus/<?= $row['IdPenjualan'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

