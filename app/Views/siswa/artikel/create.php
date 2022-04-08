<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
  <h2 class="mb-5 text-secondary text-center">Tambah Artikel</h2>

  <form action="/artikel/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="judul" class="fw-bold text-secondary">Judul</label>
          <input class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul'); ?>" placeholder="Masukkan judul artikel...">
          <div class="invalid-feedback">
            <?= $validation->getError('judul') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi" class="fw-bold text-secondary">Deskripsi</label>
          <textarea class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi" id="deskripsi" rows="6"><?= old('deskripsi') ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('deskripsi') ?>
          </div>
          <small class="text-muted"><cite>Masukkan deskripsi singkat mengenai artikel yang akan dibuat</cite></small>
        </div>

        <button class="btn btn-primary float-end" type="submit" name="upload">
          Lanjut
          <i class="fa fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </form>
</div>
<?= $this->endSection() ?>