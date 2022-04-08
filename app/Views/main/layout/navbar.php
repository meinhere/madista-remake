<?php
$path = $request->getPath();

$value = (isset($artikel['slug']) ? 'artikel/' . $artikel['slug'] : '');
?>
<?php if ($path != $value) : ?>
  <nav class="navbar navbar-expand navbar-dark bg-danger d-flex flex-column">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <h3>Madista Magz</h3>
        <p style="font-size: 0.7em;">Majalah Digital SMK Negeri 1 Tanjunganom</p>
      </a>

      <div class="navbar-right ms-auto">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="#street" data-id="_street">Street View</a>
          </li>
          <li class="ms-4">
            <a href="<?= (session()->get('auth')) ? '/siswa' : '/auth/login' ?>" class="btn btn-warning px-3">
              <i class="fa <?= (session()->get('auth')) ? 'fa-tachometer' : 'fa-sign-in' ?> me-1"></i>
              <span><?= (session()->get('auth')) ? 'Dashboard' : 'Login' ?></span>
            </a>
          </li>
        </ul>
      </div>

      <div class="dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-ellipsis-v text-white fs-2"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown03">
          <span class="dropdown-header py-0"><?= (session()->get('auth')) ? session()->get('auth') : 'Madista Menu' ?></span>
          <div class="dropdown-divider"></div>

          <li><a class="dropdown-item text-decoration-none" href="/main/streetview">Street View</a></li>
          <li>
            <a class="dropdown-item text-decoration-none" href="/main/profile">Profile Sekolah</a>
          </li>
          <li>
            <a class="dropdown-item text-decoration-none" href="<?= (session()->get('auth') ? '/siswa' : '/auth/login') ?>"><?= (session()->get('auth')) ? 'Dashboard' : 'Login' ?></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="navbar-menu mb-2 ">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-3">
          <a class="nav-link <?= ($path == '/') ? 'active' : '' ?>" href="<?= ($path == '/') ? '/#' : '/' ?>" data-id="_home">Beranda</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?= ($path == 'artikel') ? 'active' : '' ?>" href="<?= ($path == '/') ? '/#artikel' : '/artikel' ?>" data-id="_artikel">Artikel</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?= ($path == 'main/profile') ? 'active' : '' ?>" href="<?= ($path == '/') ? '/#profile' : '/main/profile' ?>" data-id="_profile">Profile</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link <?= ($path == 'main/madig') ? 'active' : '' ?>" href="<?= ($path == '/') ? '/#madig' : '/main/madig' ?>" data-id="_madig">Madig 3D</a>
        </li>
      </ul>
    </div>
    <div class="search row justify-content-center pb-3 w-100 mt-2">
      <div class="col-10 col-md-8 col-lg-6">
        <form>
          <div class="input-group">
            <input class="form-control rounded-pill" type="text" placeholder="Cari ...">
          </div>
        </form>
      </div>
    </div>

    <div class="navbar-menu-mobile mt-1">
      <ul class="navbar-nav text-center text-white mx-auto">
        <li class="nav-item mx-3 <?= ($path == '/') ? 'active' : '' ?>">
          <a class="nav-link" style="font-size: 0.9em;" href="/">
            <i class="material-icons fs-2 d-block">home</i>
            Beranda
          </a>
        </li>
        <li class="nav-item mx-3 <?= ($path == 'artikel') ? 'active' : '' ?>">
          <a class="nav-link" style="font-size: 0.9em;" href="/artikel">
            <i class="material-icons fs-2 d-block">library_books</i>
            Artikel
          </a>
        </li>
        <li class="nav-item mx-3 <?= ($path == 'main/profile') ? 'active' : '' ?>">
          <a class="nav-link" style="font-size: 0.9em;" href="/main/profile">
            <i class="material-icons fs-2 d-block">school</i>
            Profile
          </a>
        </li>
        <li class="nav-item mx-3 <?= ($path == 'main/madig') ? 'active' : '' ?>">
          <a class="nav-link" style="font-size: 0.9em;" href="/main/madig">
            <i class="material-icons fs-2 d-block">3d_rotation</i>
            Madig 3D
          </a>
        </li>
      </ul>
    </div>
  </nav>
<?php else : ?>
  <div class="container-fluid bg-danger text-white shadow">
    <div class="d-flex align-items-center justify-content-between py-2 mx-4">
      <div style="cursor: pointer;" onclick="goBack()">
        <i class="material-icons text-white">arrow_back</i>
      </div>
      <span class="text-white fs-5">Madista Artikel</span>
    </div>
  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
<?php endif ?>