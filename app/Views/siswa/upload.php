<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="upload row justify-content-center mb-5">
    <div class="col-5 text-center mt-5">
      <a href="/karya/create" class="text-decoration-none">
        <i class="fa fa-upload fs-3 mb-2 rounded-circle"></i>
        <h5>Upload Karya</h5>
      </a>
    </div>
    <div class="col-5 text-center mt-5 ms-1">
      <a href="/artikel/create" class="text-decoration-none">
        <i class="fa fa-plus fs-3 mb-2 rounded-circle"></i>
        <h5>Buat Artikel</h5>
      </a>
    </div>
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider d-block my-4 mb-3">

  <div class="ms-5">
    <?php if (session()->getFlashData('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <div class="title fw-bold">
      <i class="fa fa-image"></i>
      <span>Karyaku</span>
    </div>
    <div class="row">
      <?php $i = 1; ?>
      <?php if (count($madig)) : ?>
        <?php foreach ($madig as $item) : ?>
          <div class="col-6 col-md-3 mt-3">
            <a href="/karya/edit/<?= $item['id'] ?>" class="btn-manage-madig">
              <span class="fw-bold ms-1 mt-2 px-3 py-2 position-absolute" style="font-size: 0.8em;"><?= $i++ ?></span>
            </a>
            <span class="bg-secondary text-white fw-bold mt-2 me-3 px-3 py-2 position-absolute end-0" style="font-size: 0.8em;">
              <?= $item['status'] ?>
            </span>
            <img src="/img/madig/<?= $item['image'] ?>" class="img-fluid img-thumbnail" width="250">

            <form action="/karya/<?= $item['id'] ?>" method="POST" class="mt-2">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-outline-danger rounded-1 py-2" onclick="return confirm('Apakah anda yakin?')">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </div>

        <?php endforeach ?>
      <?php else : ?>
        <h4 class="mt-3 text-center text-muted">Belum ada Karya</h4>
      <?php endif; ?>
    </div>
  </div>

</div>
<?= $this->endSection() ?>