<?= $this->extend('siswa/layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <form action="/siswa/update/<?= $siswa['id'] ?>" method="POST">
    <?= csrf_field() ?>
    <div class="row justify-content-center text-center">
      <div class="col-8 col-md-6">
        <img src="/img/profile/<?= $siswa['img_profile'] ?>" alt="<?= $siswa['nama'] ?>" class="img-fluid rounded-circle" width="200">

        <div class="form-group">
          <label for="nama">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $siswa['nama']); ?>" placeholder="Nama Siswa">
        </div>
        <div class="form-group">
          <label for="kelas">Kelas Siswa</label>
          <input type="text" class="form-control" id="kelas" name="kelas" value="<?= old('kelas', $siswa['kelas']); ?>" placeholder="Kelas Siswa">
        </div>

        <button type="submit" class="btn btn-success">
          <i class="fa fa-save"></i>
          Simpan
        </button>
      </div>
    </div>
  </form>
</div>
<?= $this->endSection() ?>