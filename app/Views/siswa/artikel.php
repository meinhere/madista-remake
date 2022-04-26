<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10">
      <!-- <?php if (session()->getFlashData('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?> -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h4 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <i class="fa fa-bookmark fs-4"></i>
              <span class="ms-3">Draf</span>
            </button>
          </h4>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (count($draf)) : ?>
                <?php foreach ($draf as $item) : ?>
                  <div class="card mt-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="<?= ($item['thumbnail'] != null) ? '/img/thumbnail/' . $item['thumbnail'] : '/img/no-image.png' ?>" alt="<?= $item['judul'] ?>" class="img-fluid h-100">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="/artikel/manage/<?= $item['slug'] ?>" class="card-title"><?= $item['judul'] ?></a>
                          <p class="card-text mt-3" style="font-size: 0.8em;"><?= $item['deskripsi'] ?></p>
                          <small class="text-muted">
                            <?php $time = CodeIgniter\I18n\Time::parse($item['created_at']); ?>
                            <?= $time->humanize(); ?>
                          </small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="text-center text-muted">Tidak ada Artikel</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h4 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fa fa-paperclip fs-4"></i>
              <span class="ms-3">Publish</span>
            </button>
          </h4>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <?php if (count($publish)) : ?>
                <?php foreach ($publish as $item) : ?>
                  <div class="card mt-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="/img/thumbnail/<?= $item['thumbnail'] ?>" alt="<?= $item['judul'] ?>" class="img-fluid h-100">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="/artikel/manage/<?= $item['slug'] ?>" class="card-title"><?= $item['judul'] ?></a>
                          <p class="card-text mt-3" style="font-size: 0.8em;"><?= $item['deskripsi'] ?></p>
                          <small class="text-muted">
                            <?php $time = CodeIgniter\I18n\Time::parse($item['updated_at']); ?>
                            <?= $time->humanize(); ?>
                          </small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="text-center text-muted">Tidak ada Artikel</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
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
</script>
<?= $this->endSection() ?>