<?= $this->extend('main/layout/main') ?>

<?= $this->section('content') ?>
<!-- Navigate Content -->
<div class="d-flex flex-column navigate-content">
  <div class="bg-danger rounded-circle mb-2 home navigate" id="_home">
    <a href="/#" class="text-decoration-none text-white">
      <i class="material-icons fs-4 px-2 py-2">home</i>
    </a>
  </div>
  <div class="bg-danger rounded-circle mb-2 artikel navigate" id="_artikel">
    <a href=" /#artikel" class="text-decoration-none text-white">
      <i class="material-icons fs-4 px-2 py-2">library_books</i>
    </a>
  </div>
  <div class="bg-danger rounded-circle mb-2 profile navigate" id="_profile">
    <a href="/#profile" class="text-decoration-none text-white">
      <i class="material-icons fs-4 px-2 py-2">school</i>
    </a>
  </div>
  <div class="bg-danger rounded-circle mb-2 madig navigate" id="_madig">
    <a href="/#madig" class="text-decoration-none text-white">
      <i class="material-icons fs-4 px-2 py-2">3d_rotation</i>
    </a>
  </div>
  <div class="bg-danger rounded-circle mb-2 madig navigate" id="_street">
    <a href="/#street" class="text-decoration-none text-white">
      <i class="material-icons fs-4 px-2 py-2">map</i>
    </a>
  </div>
</div>
<!-- Akhir Navigate Content -->


<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/slider/bg1.jpg" class="d-block w-100" height="550" />
    </div>
    <div class="carousel-item">
      <img src="/img/slider/bg4.jpg" class="d-block w-100" height="550" />
    </div>
    <div class="carousel-item">
      <img src="/img/slider/bg5.jpg" class="d-block w-100" height="550" />
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Akhir Carousel -->

<div class="container">
  <!-- Artikel -->
  <section class="mt-5" id="artikel">
    <div class="section-header text-center mb-3">
      <span class="shape shape-left"></span>
      <h3 class="d-inline px-5">Artikel</h3>
      <span class="shape shape-right"></span>
    </div>

    <div class="row">
      <?php foreach ($artikel as $item) : ?>
        <div class="col-6 col-md-4 mb-4">
          <div class="card">
            <img src="/img/thumbnail/<?= $item['thumbnail'] ?>" class="card-img-top" alt="<?= $item['judul'] ?>" height="250" />
            <div class="card-body">
              <h5 class="card-title"><a href="/artikel/<?= $item['slug'] ?>"><?= $item['judul'] ?></a></h5>
              <span class="text-muted">
                <?php $time = CodeIgniter\I18n\Time::parse($item['updated_at']); ?>
                <?= $time->humanize(); ?>
              </span>
              <p class="card-text" style="font-size: 0.8em;">
                <?= $item['deskripsi'] ?>
              </p>
              <a href="/artikel/<?= $item['slug'] ?>" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      <div class="text-center">
        <a href="/artikel" class="btn btn-outline-danger">
          <i class="fa fa-eye me-1"></i>
          Lihat Semua
        </a>
      </div>
    </div>
  </section>
  <!-- Akhir Artikel -->

  <!-- Profile -->
  <section class="mt-5" id="profile">
    <div class="section-header text-center mb-3">
      <span class="shape shape-left"></span>
      <h3 class="d-inline px-5">Profile</h3>
      <span class="shape shape-right"></span>
    </div>

    <div class="row">
      <div class="col-md-6">
        <img src="/img/profile.jpg" class="img-fluid rounded shadow" alt="Profil Sekolah" />
      </div>
      <div class="col-md-6" style="font-size: 0.9em;">
        <p>Pada awalnya SMKN 1 Tanjunganom ini hanya terdapat 3 ruang bengkel 1 ruang kantor dan 5 kelas yang belum memadai. Sekolah ini mempunyai 3 jurusan saja yaitu TKJ (Tehnik Komputer Jaringan), TKR (Tehnik Kendaraan Ringan), TBO (Tehnik Body Otomotif).</p>
        <p>Sekolah ini hanya menerima 180 siswa-siswi baru, dari 400-an siswa-siswi yang mendaftar,hanya diterima 182 peserta didik yaitu 37 pada TKJ1, 36 pada TKJ2, 36 peserta TKR1 dan TKR2 dan 37 pada TBO.</p>
        <p>Sekolah ini berdiri tanggal 28-06-2011 dengan kepala sekolah pertama kali yaitu Bapak Suparjo S.Pd sekolah belum mempunyai satupun peralatan praktek tetapi peserta didiknya tetap antusias dalam memajukan sekolah ini. Kegiatan OSIS pertama kali masih PASIF saja Tetapi pada semester GENAP kegiatan OSIS menjadi AKTIF berkat Bimbingan Oleh Bapak Irwan Subagyo dan pada semester GENAP dibentuk Organisai PASUS (Pasukan Kusus) yang bertugas mengamankan dan mencatat siswa yang melanggar tata tertib.</p>

        <a href="/main/profile" class="btn btn-outline-danger">
          <span>Detail</span>
          <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </section>
  <!-- Akhir Profile -->

  <!-- Madig -->
  <section class="mt-5" id="madig">
    <div class="section-header text-center mb-3">
      <span class="shape shape-left"></span>
      <h3 class="d-inline px-5">Madig 3D</h3>
      <span class="shape shape-right"></span>
    </div>

    <div class="row">
      <div class="col-md-7">
        <div class=" position-relative mx-auto w-100 mt-3">
          <iframe src="/main/showmadig" style="min-height: calc(100vh - 180px)" frameborder="0" class="w-100">
          </iframe>
          <a href="/main/showmadig" class="btn btn-sm btn-white position-absolute" style="z-index: 100; padding: 10px; left: 10px; top: 5px; background: rgba(255,255,255,.9);">Buka Madig 360</a>
        </div>
      </div>
      <div class="col-md-5 mt-3">
        <p>Madig 3D adalah tempat dimana semua orang menikmati ruangan yang memiliki skala 360 derajat dengan berbagai macam karya dari siswa/siswi yang paling populer.</p>
        <p>Karya - karya tersebut dapat berupa tulisan, gambaran, foto, ataupun karya digital yang dapat dibuat dan ditampilkan di dalam ruangan ini.</p>
        <p>Dengan <cite>interface</cite> yang enak dilihat dan juga cara <cite>navigasi</cite> yang mudah dipahami oleh semua orang. Fitur ini dapat dinikmati dan digunakan oleh semua khalayak umum yang ingin melihatnya.</p>

        <a href="/main/madig" class="btn btn-outline-danger">
          Lihat Selengkapnya
          <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </section>
  <!-- Akhir Madig -->

  <!-- Street View -->
  <section class="mt-5" id="street">
    <div class="section-header text-center mb-3">
      <span class="shape shape-left"></span>
      <h3 class="d-inline px-5">Street View</h3>
      <span class="shape shape-right"></span>
    </div>

    <div class="row mt-2">
      <div class="col-md-6">
        <img src="/img/map.jpeg" class="img-fluid border" alt="Peta Lokasi SMeKTa" />
      </div>
      <div class="col-md-6">
        <img src="/img/streetview/smekta.JPG" class="img-fluid border mb-3" alt="Gambar Depan SMekTa" />

        <p>Lihat dan telusuri semua tempat yang ada di SMK Negeri 1 Tanjunganom secara langsung.</p>

        <a href="/main/streetview" class="btn btn-outline-danger">
          <i class="fa fa-eye"></i>
          Lihat Streetview
        </a>
      </div>
    </div>
  </section>
  <!-- Akhir Street View -->

  <!-- ## Versi Mobile ## -->
  <div class="container mobile-content">
    <?php foreach ($madig as $item) : ?>
      <a href="/img/madig/<?= $item['image'] ?>" class="image-popup">
        <img src="/img/madig/<?= $item['image'] ?>" class="contain img-fluid bg-white shadow-sm mb-3" alt="work-thumbnail">
      </a>
    <?php endforeach ?>

    <?= $pager->links('madig', 'custom_pagination') ?>
  </div>
  <!-- ## Akhir Versi Mobile ## -->
</div>


<script src="<?= base_url() ?>/js/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
    $('.image-popup').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      mainClass: 'mfp-fade',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
      }
    });
  });
</script>
<script>
  // Navigate Controll
  const navigateContent = document.querySelector('.navigate-content');
  const navigate = document.querySelectorAll('.navigate');

  window.addEventListener('scroll', function() {
    let scrollY = this.scrollY;
    navigateContent.style.transform = (scrollY > 70) ? 'translateY(40%)' : 'translateY(-50%)';
    navigateContent.style.zIndex = (scrollY >= 119) ? '1' : '-1';
    navigateContent.style.opacity = (scrollY >= 119) ? '1' : '0';

    navigate.forEach(e => {
      e.classList.remove('active');
    });

    const home = document.querySelector('.navigate-content #_home');
    const artikel = document.querySelector('.navigate-content #_artikel');
    const profile = document.querySelector('.navigate-content #_profile');
    const madig = document.querySelector('.navigate-content #_madig');
    const street = document.querySelector('.navigate-content #_street');
    if (scrollY >= 0 && scrollY < 785) {
      home.classList.add('active');
    } else if (scrollY >= 785 && scrollY < 1509) {
      artikel.classList.add('active');
    } else if (scrollY >= 1509 && scrollY < 1988) {
      profile.classList.add('active');
    } else if (scrollY >= 1988 && scrollY < 2570) {
      madig.classList.add('active');
    } else if (scrollY >= 2570) {
      street.classList.add('active');
    }
  });
</script>
<?= $this->endSection() ?>