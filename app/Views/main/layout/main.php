<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/bs/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/icons/fa/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/icons/ma/material-icons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/pop-up/css/magnific-popup.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">

  <title><?= $title; ?></title>
</head>

<body>

  <!-- Navbar -->
  <?= $this->include('main/layout/navbar') ?>
  <!-- Akhir Navbar -->

  <!-- ## Content ## -->
  <?= $this->renderSection('content') ?>

  <!-- Footer -->
  <?= $this->include('main/layout/footer') ?>
  <!-- Akhir Footer -->

  <!-- ## Akhir Content ## -->


  <!-- Template Javascript -->
  <script src="<?= base_url() ?>/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>/js/three.min.js"></script>
  <script src="<?= base_url() ?>/js/panolens.min.js"></script>
  <script src="<?= base_url() ?>/pop-up/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url() ?>/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>