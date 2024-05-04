<?php $url = url()->current(); ?>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto ">
    <!-- Navbar Search -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="far fa-user"></i>&nbsp;{{ Auth::guard('admin')->User()->username }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="admin_dropdown">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item">
          <i class="fas fa-power-off mr-2"></i> Logout
        </a>
      </div>
    </li>
    <!-- Navbar Search -->

    <!-- Notifications Dropdown Menu -->

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
  <!-- Brand Logo -->
  <div class="sidebar-header">
    <a href="{{ url('/admin/adminDashboard'); }}" class="d-flex align-items-center">
      <div>
        <img src="{{ url('/admin/img/trti-logo.png'); }}" class="logo-icon img-fluid" width="80" height="80" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text"> Tribal Research &amp; Training Institute</h4>
      </div>
    </a>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="{{ url('/admin/adminDashboard'); }}" class="d-block">{{ Auth::guard('admin')->User()->username }}</a>
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
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ url('/dashboard'); }}" class="nav-link @if(preg_match('/dashboard/', $url))active @endif" data-toggle="tooltip" data-placement="right" title="Get The detail overview.">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Managing Section</li>
        <!-- Start Admin Masters-->
        <li class="nav-item @if(preg_match('/sector|jobrole|education|locationcategory|usermanagement|companies/i', $url))menu-open @endif">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-th-large"></i>
            <p>Masters<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/admin/sector'); }}" class="nav-link @if(preg_match('/sector/', $url))active @endif">
                <p>Sector Management </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/jobrole'); }}" class="nav-link @if(preg_match('/jobrole/', $url))active @endif">
                <p>Job Role </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/education'); }}" class="nav-link @if(preg_match('/education/', $url))active @endif">
                <p>Education Qualification </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{ url('/admin/locationcategory'); }}" class="nav-link @if(preg_match('/locationcategory/', $url))active @endif">
                <p>Location Category Management </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{ url('/admin/usermanagement'); }}" class="nav-link @if(preg_match('/usermanagement/', $url))active @endif">
                <p>User Management </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="{{ url('/admin/companies'); }}" class="nav-link @if(preg_match('/companies/', $url))active @endif">
                <p>Company Management </p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Admin Masters -->


        <li class="nav-header">System Settings</li>

        <li class="nav-item">
          <a href="{{ url('/admin/aboutSystem'); }}" class="nav-link @if(preg_match('/aboutSystem/', $url))active @endif">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              About System
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>