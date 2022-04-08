<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?= base_url() ?>/bs/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/icons/fa/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/css/auth.css">

  <title><?= $title ?></title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="position-absolute pt-3 top-0 start-0 btn-back" onclick="goBack()">
        <i class="fa fa-arrow-left text-white fs-5"></i>
      </div>

      <div class="col-10 col-md-6">
        <div class="text-center text-white">
          <i class="fa fa-user-circle mb-3 user-icon"></i>
          <h3 class="mb-2 display-2">M A D I S TA</h3>
          <p class="mt-3">Verifikasi bahwa kamu siswa SMeKTa</p>
        </div>

        <form action="<?= base_url('/auth/authenticate') ?>" method="POST">
          <?= csrf_field(); ?>

          <?= $validation->listErrors() ?>
          <div class="form-floating mb-3">
            <input type="text" class="form-control <?= (session()->getFlashdata('error')) ? 'is-invalid' : '' ?>" id="floatingInput" name="nisn" placeholder="N I S N" value="<?= old('nisn') ?>">
            <label for="floatingInput">N I S N</label>

            <div class="invalid-feedback bg-danger text-white rounded text-center py-2">
              <?= session()->getFlashdata('error') ?>
            </div>
          </div>

          <button class="btn btn-warning px-4" name="login" type="submit">
            <i class="fa fa-send"></i>
            Login
          </button>

        </form>
      </div>

      <div class="position-fixed bottom-0 text-center">
        <p class="mb-2 text-white">SMeKTa Internal Web &copy; <?= date('Y') ?></p>
      </div>
    </div>
  </div>

  <script src="<?= base_url() ?>/bs/js/bootstrap.bundle.min.js"></script>
  <script>
    function goBack() {
      document.location.href = "<?= $path; ?>";
    }
  </script>
</body>

</html>