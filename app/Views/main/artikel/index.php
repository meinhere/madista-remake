<?= $this->extend('main/layout/main') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="row content-main">
    <?php if ($artikel == null) : ?>
      <div class="card shadow-sm mt-2" style="min-height: calc(100vh - 180px)">
        <div class="card-body d-flex justify-content-center align-items-center">
          <div class="vw-100 text-center">
            <span class="h2 font-weight-bold text-muted">Artikel Kosong</span>
          </div>
        </div>
      </div>
    <?php else : ?>
      <?php foreach ($artikel as $item) : ?>
        <div class="col-12 col-md-4">
          <div class="card shadow contain py-2 px-3 mb-3">
            <a href="/artikel/<?= $item['slug'] ?>"><?= $item['judul'] ?></a>
            <small class="text-muted mt-1 mb-2">
              <?php $time = CodeIgniter\I18n\Time::parse($item['created_at']); ?>
              <?= $time->humanize(); ?>
            </small>
            <div class="card-body p-0 m-0">
              <?php if ($item['thumbnail'] != null) : ?>
                <img class=" img-fluid float-end ms-1 mb-1" src="/img/thumbnail/<?= $item['thumbnail'] ?>" width="120" height="150">
              <?php endif ?>
              <p class="text-dark mb-0" style=" font-size: 0.85em;"><?= $item['deskripsi'] ?></p>
              <small class="text-muted"><?= $author['nama'] ?></small>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</div>

<?= $this->endSection() ?>