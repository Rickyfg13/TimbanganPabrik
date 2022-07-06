<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('asset/dist/img/liki_2.png') }}" alt="Liki LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kerani Timbang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Elda Suryani</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> 
          </li>

        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('truk.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Truk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{route ('afdeling.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Afdeling</p>
                </a>
              </li>
             
            </ul>
          </li> 
          
          <li class="nav-item">
            <a href="{{route ('timbanglapangan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Timbang Lapangan
              </p>
            </a>
          </li> 
          
          <li class="nav-item">
            <a href="{{route ('timbangpabrik.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Timbang Pabrik
              </p>
            </a>
          </li> 
          

          <li class="nav-item">
            <a href="{{route ('hasiltimbang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Laporan Selisih Timbang
              </p>
            </a>
          </li> 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>