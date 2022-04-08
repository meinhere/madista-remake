<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>
  <div class="row text-center">
    <div class="col-12">
      <img src="/img/profile/<?= $siswa['img_profile'] ?>" alt="<?= $siswa['nama'] ?>" class="img-fluid rounded-circle" width="200">

      <div class="detail my-3">
        <h5><?= $siswa['nama'] ?></h5>
        <p class="mb-0"><?= $siswa['kelas'] ?></p>
        <span class="text-muted"><?= $siswa['nisn'] ?></span>
      </div>

      <a href="/siswa/edit" class="btn btn-warning">
        <i class="fa fa-pencil"></i>
        Edit Profile
      </a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>