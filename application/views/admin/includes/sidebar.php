<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>admin/index">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <!-- <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Interface
  </div> -->

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item <?php echo isset($buttons) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/buttons">Buttons</a>
        <a class="collapse-item <?php echo isset($cards) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/cards">Cards</a>
      </div>
    </div>
  </li> -->

  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item <?php echo isset($colors) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/colors">Colors</a>
        <a class="collapse-item <?php echo isset($borders) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/borders">Borders</a>
        <a class="collapse-item <?php echo isset($animations) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/animations">Animations</a>
        <a class="collapse-item <?php echo isset($other) ? "active" : "";  ?>" href="<?php echo base_url(); ?>admin/other">Other</a>
      </div>
    </div>
  </li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Heading -->
  <!-- <div class="sidebar-heading">Addons</div> -->

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="<?php echo base_url(); ?>admin/login">Login</a>
        <a class="collapse-item" href="<?php echo base_url(); ?>admin/register">Register</a>
        <a class="collapse-item" href="<?php echo base_url(); ?>admin/forgot_password">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a>
      </div>
    </div>
  </li> -->

  <!-- Nav Item - Charts -->
  <!-- <li class="nav-item <?php echo isset($charts) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/charts">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li> -->
  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item <?php echo isset($tables) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/tables">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->
  <!-- Nav Item - Books -->
  <li class="nav-item <?php echo isset($books) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/books">
      <i class="fas fa-fw fa-book"></i>
      <span>Books</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Nav Item - Authors -->
  <li class="nav-item <?php echo isset($authors) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/authors">
      <i class="fas fa-fw fa-table"></i>
      <span>Author</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Nav Item - Genres -->
  <li class="nav-item <?php echo isset($genres) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/genres">
      <i class="fas fa-fw fa-table"></i>
      <span>Genres</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Nav Item - Status -->
  <li class="nav-item <?php echo isset($statuses) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/statuses">
      <i class="fas fa-fw fa-table"></i>
      <span>Statuses</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Nav Item - Types -->
  <li class="nav-item <?php echo isset($types) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/types">
      <i class="fas fa-fw fa-user"></i>
      <span>Types</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Nav Item - Users -->
  <li class="nav-item <?php echo isset($users) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/users">
      <i class="fas fa-fw fa-user"></i>
      <span>User</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>