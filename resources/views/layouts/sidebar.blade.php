<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Bookly <sup>MD</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>



  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/staffs')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Staffs</span></a>
  </li>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/customers')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Customers</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/rooms')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Rooms</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/reservations')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Reservations</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="{{url('/admin/reservations')}}">
          <i class="fas fa-fw fa-money"></i>
          <span>Payments</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
