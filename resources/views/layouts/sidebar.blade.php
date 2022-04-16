  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/3kMangaLogo.png" alt="3kManga Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">3kManga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- Home Menu Item -->
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- Library Menu Item -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Library
              </p>
            </a>
          </li>
          <!-- Update Menu Item -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-upload"></i>
              <p>
                Update
              </p>
            </a>
          </li>
          <!-- Admin Menu Item -->
          <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>