  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">TOKO KITA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">@kelompok5</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/pengguna" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/penjualan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/pembelian" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>
          <li class="nav-header">Extra</li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/About Us" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                About Us
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>