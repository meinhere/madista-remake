<?= $this->extend('main/layout/main') ?>

<?= $this->section('content') ?>
<div class="container content-main">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="position-relative w-100">
        <iframe src="/main/showmadig" frameborder="0" class="w-100 frame-madig3d">
        </iframe>
        <a href="/main/showmadig" class="btn btn-sm btn-white position-absolute">Buka Madig 360</a>
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-3">
    <div class="col-12 col-md-8">
      <div class="section-header">
        <h3>Detail</h3>
      </div>

      <p>Madig 3D adalah tempat dimana semua orang menikmati ruangan yang memiliki skala 360 derajat dengan berbagai macam karya dari siswa/siswi yang paling populer.</p>
      <p>Karya - karya tersebut dapat berupa tulisan, gambaran, foto, ataupun karya digital yang dapat dibuat dan ditampilkan di dalam ruangan ini.</p>
      <p>Dengan <cite>interface</cite> yang enak dilihat dan juga cara <cite>navigasi</cite> yang mudah dipahami oleh semua orang. Fitur ini dapat dinikmati dan digunakan oleh semua khalayak umum yang ingin melihatnya.</p>
    </div>
  </div>
</div>
<?= $this->endSection() ?>