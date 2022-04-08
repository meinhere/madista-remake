<?= $this->extend('main/layout/main') ?>

<?= $this->section('content') ?>
<?php if ($artikel['status'] == 'queue') : ?>
  <?php if (session()->get('nisn')) : ?>
    <div class="container min-vh-100 shadow-sm bg-white py-4" id="konten">
      <?= $artikel['konten_artikel'] ?>
    </div>
  <?php else : ?>
    <div class="card shadow-sm mt-2" style="height: calc(100vh - 180px)">
      <div class="card-body d-flex justify-content-center align-items-center">
        <div class="vw-100 text-center">
          <span class="h2 font-weight-bold text-muted text-center">Artikel sedang dalam perbaikan</span>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php else : ?>
  <div class="container shadow-sm bg-white pt-4" id="konten">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 mt-3">
        <?= $artikel['konten_artikel'] ?>
      </div>
      <div class="col-12 col-md-4 mt-3">
        <h4 class="fw-bold pt-2 text-center">Artikel Lainnya</h4>

        <!-- <div class="card">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="" alt="">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>
<?php endif ?>

<?= $this->endSection() ?>