<?= $this->extend('main/layout/main') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="row content-main">
    <div class="col-12 text-center">
      <img src="/img/profile.jpg" class="img-fluid rounded shadow" alt="Profile Sekolah">
    </div>
    <div class="col-12">
      <div class="judul section-header mt-3">
        <h3>Sejarah SMeKTa</h3>
      </div>
      <div class="detail-profile">
        <p>Pada awalnya SMKN 1 Tanjunganom ini hanya terdapat 3 ruang bengkel 1 ruang kantor dan 5 kelas yang belum memadai. Sekolah ini mempunyai 3 jurusan saja yaitu TKJ (Tehnik Komputer Jaringan), TKR (Tehnik Kendaraan Ringan), TBO (Tehnik Body Otomotif).</p>
        <p>Sekolah ini hanya menerima 180 siswa-siswi baru, dari 400-an siswa-siswi yang mendaftar,hanya diterima 182 peserta didik yaitu 37 pada TKJ1, 36 pada TKJ2, 36 peserta TKR1 dan TKR2 dan 37 pada TBO.</p>
        <p>Sekolah ini berdiri tanggal 28-06-2011 dengan kepala sekolah pertama kali yaitu Bapak Suparjo S.Pd sekolah belum mempunyai satupun peralatan praktek tetapi peserta didiknya tetap antusias dalam memajukan sekolah ini. Kegiatan OSIS pertama kali masih PASIF saja Tetapi pada semester GENAP kegiatan OSIS menjadi AKTIF berkat Bimbingan Oleh Bapak Irwan Subagyo dan pada semester GENAP dibentuk Organisai PASUS (Pasukan Kusus) yang bertugas mengamankan dan mencatat siswa yang melanggar tata tertib.</p>
      </div>
      <div class="visi text-center mt-5">
        <div class="section-header mb-2">
          <span class="shape shape-left"></span>
          <h3 class="d-inline px-5">Visi</h3>
          <span class="shape shape-right"></span>
        </div>
        <p>“Terbentuknya Mutu Tamatan yang berkarakter, dengan mensinergikan IMTAQ dan IMTEK secara mandiri dan mampu bersaing di era global “</p>
      </div>
      <div class="misi mt-5">
        <div class="section-header text-center mb-2">
          <span class="shape shape-left"></span>
          <h3 class="d-inline px-5">Misi</h3>
          <span class="shape shape-right"></span>
        </div>
        <ol class="m-0 pl-3">
          <li>Mengembangkan sekolah kejuruan yang memadukan iman dan taqwa dengan ilmu pengetahuan dan teknologi.</li>
          <li>Memberdayakan sekolah kejuruan dan pendidikan karakter secara sinergi dan terarah untuk mewujudkan program pendidikan dan wajib belajar dalam rangka menyongsong era globalisasi.</li>
          <li>Mengembangkan iklim belajar yang berorientasi pada ketrampilan dan teknologi dengan tidak meninggalkan norma dan nilai budaya bangsa Indonesia.</li>
          <li>Mewujudkan sistem pembelajaran yang efektif, efisien dan berdisiplin tinggi serta memiliki etos kerja.</li>
        </ol>
      </div>
    </div>
    <div class="col-12 mt-5 text-center">
      <div class="section-header mb-3">
        <span class="shape shape-left"></span>
        <h3 class="d-inline px-5">Kompetensi Keahlian</h3>
        <span class="shape shape-right"></span>
      </div>
      <a href="/img/kompetensi.png" class="image-popup">
        <img src="/img/kompetensi.png" alt="Kompetensi Keahlian di SMeKTa" class="img-fluid">
      </a>
    </div>
  </div>
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
<?= $this->endSection() ?>