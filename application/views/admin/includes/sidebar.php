<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>admin/dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <li class="nav-item <?php echo isset($books) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/books">
      <i class="fas fa-fw fa-book"></i>
      <span>BOOKS</span></a>
  </li>
  <!-- Nav Item - Authors -->
  <li class="nav-item <?php echo isset($authors) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/authors">
      <i class="fas fa-fw fa-table"></i>
      <span>AUTHORS</span></a>
  </li>
  <!-- Nav Item - Genres -->
  <li class="nav-item <?php echo isset($genres) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/genres">
      <i class="fas fa-fw fa-table"></i>
      <span>GENRES</span></a>
  </li>
  <!-- Nav Item - Status -->
  <li class="nav-item <?php echo isset($statuses) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/statuses">
      <i class="fas fa-fw fa-table"></i>
      <span>STATUSES</span></a>
  </li>
  <!-- Nav Item - Types -->
  <li class="nav-item <?php echo isset($types) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/types">
      <i class="fas fa-fw fa-user"></i>
      <span>TYPES</span></a>
  </li>
  <!-- Nav Item - Users -->
  <li class="nav-item <?php echo isset($users) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/users">
      <i class="fas fa-fw fa-user"></i>
      <span>USERS</span></a>
  </li>
    <!-- Nav Item - STAFFS -->
    <li class="nav-item <?php echo isset($staffs) ? "active" : "";  ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>admin/staffs">
      <i class="fas fa-fw fa-user"></i>
      <span>STAFFS</span></a>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>