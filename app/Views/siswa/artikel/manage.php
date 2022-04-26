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
    <form action="/artikel/<?= $artikel['id'] ?>" method="POST" class="d-inline" id="form-delete">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-danger" id="btn-delete">
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
        <script src="<?= base_url(); ?>/ckeditor/ckeditor.js"></script>
        <div class="form-group">
          <textarea name="konten_artikel" id="konten_artikel" rows="10" cols="80"><?= old('konten_artikel', $artikel['konten_artikel']); ?></textarea>
        </div>

        <button class="btn btn-primary" type="submit">
          <i class="fa fa-save"></i>
          Simpan
        </button>
      </div>
    </div>
  </form>
</div>

<script src="<?= base_url() ?>/swal/sweetalert2.min.js"></script>
<script>
  // CK Editor Function
  CKEDITOR.replace('konten_artikel', {
    removePlugins: 'image',
  });

  // Trix File Remove Function
  document.addEventListener("trix-file-accept", function(e) {
    e.preventDefault();
  });

  // Confirm Delete
  let btnDelete = document.getElementById('btn-delete');
  let formDelete = document.getElementById('form-delete');

  btnDelete.addEventListener('click', function(e) {
    e.preventDefault();

    Swal.fire({
      title: 'Apakah kamu yakin?',
      text: "data yang telah dihapus tidak akan kembali lagi!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, saya yakin!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        formDelete.submit()
      }
    })
  });
</script>
<?= $this->endSection() ?>