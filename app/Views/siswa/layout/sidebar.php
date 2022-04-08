<?php
$path = $request->getPath();

$pathUpload = ['siswa', 'siswa/artikel', 'siswa/profile', 'siswa/edit'];
?>

<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/siswa">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      <span>M A D I S T A</span>
      <span class="" style="font-size: 0.5em;">Majalah Digital SMeKTa</span>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider text-white my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= ($path == 'siswa') ? 'active' : '' ?>">
    <a class="nav-link" href="/siswa">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider text-white">

  <!-- Heading -->
  <div class="sidebar-heading">
    Main Menu
  </div>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item <?= (!in_array($path, $pathUpload)) ? 'active' : '' ?>">
    <a class="nav-link" href="/siswa/upload">
      <i class="fas fa-fw fa-image"></i>
      <span>Upload Karya</span>
    </a>
  </li>
  <li class="nav-item <?= ($path == 'siswa/artikel') ? 'active' : '' ?>">
    <a class="nav-link" href="/siswa/artikel">
      <i class="fas fa-fw fa-edit"></i>
      <span>Artikel</span>
    </a>
  </li>
  <li class="nav-item <?= ($path == 'siswa/profile' || $path == 'siswa/edit') ? 'active' : '' ?>">
    <a class="nav-link" href="/siswa/profile">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Profile</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider text-white d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>