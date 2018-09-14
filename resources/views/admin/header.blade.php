  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('admin/profile') }}" class="dropdown-item"><span class="fa fa-user-lock"></span> Profil</a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('admin/logout') }}" class="dropdown-item"><span class="fa fa-power-off"></span> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->