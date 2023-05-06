  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pembelian</h1>
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
          <a href="#" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#tambah<?= $data['controllerName'] ?>Modal">Tambah Pembelian</a>
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
                      <th>Id Pembelian</th>
                      <th>Tanggal Pembelian</th>
                      <th>Jumlah Pembelian</th>
                      <th>Harga Beli</th>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Id Supplier</th>
                      <th>Nama Supplier</th>
                      <th>Alamat Supplier</th>
                      <th>Kota Supplier</th>
                      <th>No Hp Supplier</th>
                      <th>Created By</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['pembelian'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['IdPembelian'];?></td>
                      <td><?= $row['TanggalPembelian'];?></td>
                      <td><?= $row['JumlahPembelian'];?></td>
                      <td><?= $row['HargaBeli'];?></td>
                      <td><?= $row['IdBarang'];?></td>
                      <td><?= $row['NamaBarang'];?></td>
                      <td><?= $row['IdSupplier'];?></td>
                      <td><?= $row['NamaSupplier'];?></td>
                      <td><?= $row['AlamatSupplier'];?></td>
                      <td><?= $row['KotaSupplier'];?></td>
                      <td><?= $row['NoHpSupplier'];?></td>
                      <td><?= $row['CreatedBy'];?></td>
                      <td>
                      <a href="<?= BASEURL; ?>/pembelian/edit/<?= $row['IdPembelian'] ?>" class="badge badge-info ">Edit</a> 
                      <a href="<?= BASEURL; ?>/pembelian/hapus/<?= $row['IdPembelian'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

