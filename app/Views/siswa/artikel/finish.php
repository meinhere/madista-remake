<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
  <form action="/artikel/attempt/<?= $artikel['id'] ?>" method="post" enctype="multipart/form-data" class="mt-5">
    <?= csrf_field(); ?>
    <div class="row justify-content-center">
      <input type="hidden" name="slugLama" value="<?= $artikel['slug'] ?>">
      <input type="hidden" name="thumbLama" value="<?= $artikel['thumbnail'] ?>">
      <input type="hidden" name="status" value="<?= $artikel['status'] ?>">
      <div class="col-12 col-md-6">
        <div class="form-group text-center">
          <label for="thumbnail" class="fw-bold text-secondary">Thumbnail</label>
          <?php if ($artikel['thumbnail']) : ?>
            <img src="/img/thumbnail/<?= $artikel['thumbnail'] ?>" class="img-fluid img-preview d-block mx-auto" width="400">
          <?php else : ?>
            <img src="/img/no-image.png" class="img-fluid img-preview d-block mx-auto" width="400">
          <?php endif; ?>
          <input type="file" class="form-control <?= $validation->hasError('thumbnail') ? 'is-invalid' : '' ?>" id="thumbnail" name="thumbnail" onchange="previewImage()">
          <div class="invalid-feedback">
            <?= $validation->getError('thumbnail') ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="judul" class="fw-bold text-secondary">Judul</label>
          <input class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul', $artikel['judul']); ?>" placeholder="Masukkan judul artikel...">
          <div class="invalid-feedback">
            <?= $validation->getError('judul') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi" class="fw-bold text-secondary">Deskripsi</label>
          <textarea class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : '' ?>" name="deskripsi" id="deskripsi" rows="6"><?= old('deskripsi', $artikel['deskripsi']) ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('deskripsi') ?>
          </div>
          <small class="text-muted"><cite>Masukkan deskripsi singkat mengenai artikel yang akan dibuat</cite></small>
        </div>

        <button class="btn btn-primary float-end" type="submit" name="upload">
          <i class="fa fa-send"></i>
          Publish
        </button>
      </div>
    </div>
  </form>
</div>

<script>
  function previewImage() {
    const image = document.querySelector("#thumbnail");
    const imagePreview = document.querySelector(".img-preview");

    image.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imagePreview.src = oFREvent.target.result;
    };
  }
</script>
<?= $this->endSection() ?>