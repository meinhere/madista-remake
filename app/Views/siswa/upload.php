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
    <div class="title fw-bold">
      <i class="fa fa-image"></i>
      <span>Karyaku</span>
    </div>
    <div class="row row-madig">
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

            <form action="/karya/<?= $item['id'] ?>" method="POST" class="mt-2" id="form-delete">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-outline-danger rounded-1 py-2" id="btn-delete" data-id="<?= $item['id']; ?>">
                <i class="fa fa-trash" data-id="<?= $item['id']; ?>"></i>
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

<script src="<?= base_url() ?>/swal/sweetalert2.min.js"></script>
<script>
  const notification = "<?= session()->getFlashdata('success'); ?>";

  if (notification) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    })

    Toast.fire({
      icon: 'success',
      title: notification
    })
  }

  let rowMadig = document.querySelector('.row-madig');
  let btnManage = document.querySelector('.btn-manage-madig');
  let formDelete = document.getElementById('form-delete');

  rowMadig.addEventListener('click', function(e) {
    if (e.target.tagName == 'BUTTON' || e.target.tagName == 'I') {

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
          let id = e.target.getAttribute('data-id');
          formDelete.setAttribute('action', '/karya/' + id);
          formDelete.submit();
        }
      })
    }
  })
</script>
<?= $this->endSection() ?>