<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Keuntungan & Kerugian</h3>
        </div>
        <div class="card-body">
          

        <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              

              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <!-- ./col -->
                  
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>


        </div>
          <div style="width: 800px;">
            <canvas id="myChart"></canvas>
            <canvas id="stockChart"></canvas>
            <canvas id="terjualChart"></canvas>
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


  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<script>
// Panggil fungsi untuk mengambil data penjualan/keuntungan
$.ajax({
      url: "<?= BASEURL; ?>/<?= $data['controllerName'] ?>/getDataKeuntungan",
      type: 'POST',
      success: function(result) {
        // Parse result to a JavaScript object
        var dataObj = JSON.parse(result);

        // Olah data hasil query
        var labels = [];
        var data = [];

      dataObj.forEach(function(row) {
          labels.push(row.TanggalPenjualan);
          data.push(row.Keuntungan);
      });

    // Filter data untuk 1 minggu terakhir
    var labelsBaru = labels.slice(-7);
    var dataBaru = data.slice(-7);

    // Inisialisasi chart
    var ctx = document.getElementById('line-chart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labelsBaru,
        datasets: [{
          label: 'Keuntungan tiap tanggal',
          data: dataBaru,
          fill: false,
          borderColor: 'rgb(255, 0, 0)',
          tension: 0.1
        }]
      },
      options: {
        scales: {
          x: {
            title: {
              display: true,
              text: 'Tanggal Pembelian'
            }
          },
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
}
);
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['labels']); ?>,
            datasets: [{
                label: 'Keuntungan',
                data: <?php echo json_encode($data['values']); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

// Chart untuk stock
    var ctx = document.getElementById('stockChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['labels']); ?>,
            datasets: [{
                label: 'Stock Tiap Barang',
                data: <?php echo json_encode($data['stocks']); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Chart untuk barang Terjual
    var ctx = document.getElementById('terjualChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($data['labels']); ?>,
            datasets: [{
                label: 'Jumlah Terjual Tiap Barang',
                data: <?php echo json_encode($data['jumlahTerjual']); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
