<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
  <h2 class="mb-4 text-secondary">Upload Karya</h2>
  <form action="/karya/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="keterangan" class="fw-bold text-secondary">Deskripsi Singkat</label>
          <input class="form-control" id="keterangan" name="keterangan" value="<?= old('keterangan'); ?>" placeholder="Masukkan deskripsi ...">
        </div>
        <div class="form-group">
          <label for="status" class="fw-bold text-secondary">Status</label>
          <select class="form-select text-secondary <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" name="status" id="status">
            <option value="">-- Pilih status --</option>
            <option value="draf">Draf</option>
            <option value="publish">Publish</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('status') ?>
          </div>
          <small class="form-text text-muted">
            <ul>
              <li><strong>Draf</strong> => semua kiriman karya tidak akan ditampilkan di publik</li>
              <li><strong>Publish</strong> => semua karya akan dapat dilihat oleh semua orang</li>
            </ul>
          </small>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group text-center">
          <label for="image" class="fw-bold text-secondary">Gambar</label>
          <img src="/img/no-image.png" class="img-fluid img-preview d-block mx-auto" width="400">
          <input type="file" class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : '' ?>" id="image" name="image" onchange="previewImage()">
          <div class="invalid-feedback">
            <?= $validation->getError('image') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button class="btn btn-primary" type="submit" name="upload">
          <i class="fa fa-send"></i>
          Kirim
        </button>
      </div>
    </div>
  </form>
</div>
<script>
  function previewImage() {
    const image = document.querySelector("#image");
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