<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<style>
  trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
  }
</style>

<div class="container">
  <h2 class="text-center">Isi Artikel</h2>
  <div>
    <a href="/siswa/artikel" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i>
      Kembali
    </a>
    <a href="/artikel/finish/<?= $artikel['slug'] ?>" class="btn btn-success">
      <i class="fa <?= ($artikel['status'] == 'draf') ? 'fa-send' : 'fa-edit' ?>"></i>
      <?= ($artikel['status'] == 'draf') ? 'Publish' : 'Edit' ?>
    </a>
    <form action="/artikel/<?= $artikel['id'] ?>" method="POST" class="d-inline">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">
        <i class="fa fa-trash"></i>
        Hapus
      </button>
    </form>
  </div>

  <form action="/artikel/update/<?= $artikel['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row justify-content-center mt-4">
      <input type="hidden" name="slug" value="<?= $artikel['slug'] ?>">
      <div class="col-12">
        <div class="form-group">
          <input id="konten_artikel" type="hidden" name="konten_artikel" value="<?= old('konten_artikel', $artikel['konten_artikel']) ?>">
          <trix-editor input="konten_artikel"></trix-editor>
        </div>

        <button class="btn btn-primary" type="submit">
          <i class="fa fa-save"></i>
          Simpan
        </button>
      </div>
    </div>
  </form>
</div>

<script>
  // Trix File Remove Function
  document.addEventListener("trix-file-accept", function(e) {
    e.preventDefault();
  });
</script>
<?= $this->endSection() ?>