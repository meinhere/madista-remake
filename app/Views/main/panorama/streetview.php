<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>/icons/fa/css/font-awesome.min.css">

  <title><?= $title; ?></title>
  <style type="text/css">
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    html,
    body {
      width: 100%;
      height: 100vh;
      overflow: hidden;
      padding: 0;
    }

    #container {
      width: 100%;
      height: 100vh;
      position: relative;
    }

    .VRmode {
      position: absolute;
      opacity: .5;
      z-index: 3;
      cursor: pointer;
      top: 60px;
      right: 15px;
      background-color: #fff;
      font-weight: bolder;
      border-radius: 10px;
      padding: 10px 9px;
      border: none;
    }

    .SwipeMode {
      position: absolute;
      display: none;
      padding: 2px 5px;
      top: 10px;
      opacity: .7;
      left: calc(50% - 25px);
    }

    svg#panolens-view-indicator-container {
      background-color: #fff;
      position: absolute;
      left: auto !important;
      right: 15px !important;
      border-radius: 10px;
      padding-top: 5px;
    }

    #container .topBar {
      font-family: 'Arial', sans-serif;
      text-align: center;
      background: linear-gradient(180deg, rgba(0, 0, 1, 0.5847514005602241) 0%, rgba(0, 3, 4, 0.2533788515406162) 45%, rgba(0, 212, 255, 0) 82%);
      position: absolute;
      top: 0;
      left: 0;
      color: #fff;
      width: 100%;
      height: 50px;
      display: flex;
      justify-content: space-between;
      padding-top: 5px
    }

    .BackBtn {
      color: #fff;
      font-weight: bold;
      padding: 2px 5px;
      margin: 10px 0 0 10px;
      border-radius: 8px;
      cursor: pointer;
      height: 20px;
      background: rgba(255, 255, 255, .5);
    }

    #container div:nth-child(7) {
      background: rgba(255, 255, 255, .7);
      cursor: pointer;
      position: absolute;
      left: 40%;
      top: 100px;
      right: auto !important;
      border: none;
      border-radius: 5px;
      color: #000 !important;
    }
  </style>
</head>

<body>

  <div id="container">
    <div class="topBar">
      <i class="BackBtn fa fa-arrow-left" title="Kembali"></i>
      <span>SMKN 1 Tanjunganom</span>
      <span></span>
    </div>
    <!-- <button class="VRmode">V R</button> -->
    <button class="SwipeMode">Tutup</button>
  </div>


  <script src="<?= base_url() ?>/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>/js/three.min.js"></script>
  <script src="<?= base_url() ?>/js/panolens.min.js"></script>
  <script>
    let viewer, canvas, infospot;
    // _buttonVR = document.querySelector(".VRmode"),
    let _buttonNormal = document.querySelector(".SwipeMode"),
      _titleIMG = document.querySelector('.topBar span');
    let fullscreen = {
      request: function(elemt) {
        if (elemt.requestFullscreen) {
          elemt.requestFullscreen();
        } else if (elemt.msRequestFullscreen) {
          elemt.msRequestFullscreen();
        } else if (elemt.mozRequestFullScreen) {
          elemt.mozRequestFullScreen();
        } else if (elemt.webkitRequestFullscreen) {
          elemt.webkitRequestFullscreen();
        }
      },
      exit: function() {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        }
      }
    };
    canvas = document.querySelector('#container');

    //Insert Gambar
    //depan
    let p_LogoSmekta = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/smekta.JPG');
    let p_FgerbangUtama = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/gerbang.JPG');
    let p_gerbangUtama = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/gerbangmasuk.JPG');
    let p_LabMM = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/labmm.JPG');
    let p_parkKepsek = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/jalanguru.JPG');
    let p_masjid = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/masjid.JPG');
    //tengah
    let p_sampingLokket = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/pojokkantor.JPG');
    let p_lapangan = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/lapangan.JPG');
    let p_perpus = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/perpus.JPG');
    let p_depanSanggar = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/pojokruangguru.JPG');
    let p_depanPessat = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/depanpessat-LAP.JPG');
    let p_lobyBack = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/lobyback.JPG');
    let p_tbo = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/tbo.JPG');
    let p_jalanKantin = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/jalankantin.JPG');
    let p_jalanPessat = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/jalanpessat.JPG');
    let p_kopsis = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/kopsis.JPG');
    //kelas belakang
    let p_lasTPL = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/lasTpl.JPG');
    let p_pessatBack = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/belakangpessat.JPG');
    //apat
    let p_tengahapat = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/tengahapat.JPG');
    let p_apat = new PANOLENS.ImagePanorama('<?= base_url() ?>/img/streetview/apat.JPG');

    // Render Photo
    viewer = new PANOLENS.Viewer({
      container: canvas,
      // controlBar: false,
      controlButtons: ['setting'],
      viewIndicator: true,
      indicatorSize: 35,
      // output: 'overlay'
    });
    viewer.add(p_FgerbangUtama, p_depanPessat, p_lapangan, p_pessatBack, p_gerbangUtama, p_LogoSmekta, p_lasTPL, p_LabMM, p_parkKepsek, p_masjid, p_sampingLokket, p_lapangan, p_perpus, p_depanSanggar, p_lobyBack, p_tbo, p_jalanKantin, p_jalanPessat, p_kopsis, p_tengahapat, p_apat);

    // link street
    p_FgerbangUtama.link(p_gerbangUtama, new THREE.Vector3(5000.00, -720.62, 163.41));
    p_FgerbangUtama.link(p_LogoSmekta, new THREE.Vector3(-921.91, -290.72, 5000.00));

    p_gerbangUtama.link(p_LabMM, new THREE.Vector3(-5000.00, 111.23, 2776.47));
    p_gerbangUtama.link(p_parkKepsek, new THREE.Vector3(5000.00, -481.87, -811.61));
    p_gerbangUtama.link(p_FgerbangUtama, new THREE.Vector3(-2367.78, -1137.22, -5000.00));
    p_gerbangUtama.link(p_lobyBack, new THREE.Vector3(2260.89, 6.33, 5000.00));

    p_parkKepsek.link(p_masjid, new THREE.Vector3(-725.77, -97.98, -5000.00));
    p_parkKepsek.link(p_sampingLokket, new THREE.Vector3(5000.00, -490.86, -678.83));
    p_parkKepsek.link(p_gerbangUtama, new THREE.Vector3(324.38, -200.51, 5000.00));

    p_sampingLokket.link(p_parkKepsek, new THREE.Vector3(-5000.00, -126.75, -1777.33));
    p_sampingLokket.link(p_lobyBack, new THREE.Vector3(-1880.53, -69.14, 5000.00));
    p_sampingLokket.link(p_tbo, new THREE.Vector3(2352.98, -322.32, -5000.00));
    p_sampingLokket.link(p_perpus, new THREE.Vector3(5000.00, -438.87, 2069.35));
    p_sampingLokket.link(p_lapangan, new THREE.Vector3(2020.09, -394.35, 5000.00));

    p_lobyBack.link(p_sampingLokket, new THREE.Vector3(488.00, -293.70, -5000.00));
    p_lobyBack.link(p_lapangan, new THREE.Vector3(5000.00, -643.75, -2500.31));
    p_lobyBack.link(p_depanSanggar, new THREE.Vector3(-317.73, -595.20, 5000.00));
    p_lobyBack.link(p_gerbangUtama, new THREE.Vector3(-5000.00, -239.20, -119.39));

    p_depanSanggar.link(p_lobyBack, new THREE.Vector3(-5000.00, -774.45, -3035.67));
    p_depanSanggar.link(p_lapangan, new THREE.Vector3(-1474.09, -368.33, -5000.00));
    p_depanSanggar.link(p_depanPessat, new THREE.Vector3(5000.00, -587.56, -4652.78));
    p_depanSanggar.link(p_jalanKantin, new THREE.Vector3(5000.00, -476.74, 4943.98));

    p_jalanKantin.link(p_depanSanggar, new THREE.Vector3(279.26, -283.17, -5000.00));
    p_jalanKantin.link(p_kopsis, new THREE.Vector3(5000.00, 135.93, 441.80));

    p_pessatBack.link(p_tengahapat, new THREE.Vector3(2630.42, -357.56, 5000.00));
    p_pessatBack.link(p_lasTPL, new THREE.Vector3(-5000.00, -245.63, 2688.62));

    p_lapangan.link(p_depanSanggar, new THREE.Vector3(1000.10, -52.28, 5000.00));
    p_lapangan.link(p_sampingLokket, new THREE.Vector3(-5000.00, -362.80, -387.93));
    p_lapangan.link(p_depanPessat, new THREE.Vector3(5000.00, -92.74, 1233.61));

    p_depanPessat.link(p_jalanPessat, new THREE.Vector3(5000.00, -431.32, -732.54));
    p_depanPessat.link(p_lapangan, new THREE.Vector3(-803.74, -436.44, -5000.00));
    p_depanPessat.link(p_depanSanggar, new THREE.Vector3(-5000.00, -587.01, -1935.79));

    p_lasTPL.link(p_pessatBack, new THREE.Vector3(5000.00, -170.66, -1205.88));
    p_LogoSmekta.link(p_FgerbangUtama, new THREE.Vector3(-884.50, -466.45, -5000.00));
    p_LabMM.link(p_gerbangUtama, new THREE.Vector3(5000.00, -365.28, 15.46));
    p_masjid.link(p_parkKepsek, new THREE.Vector3(5000.00, -544.75, -3305.66));
    p_tbo.link(p_sampingLokket, new THREE.Vector3(-2374.01, -293.06, -5000.00));

    // let textSMK = new SpriteText('SMKN 1 Tanjunganom', 300, #fff, 1, options);
    // p_gerbangUtama.addText(textSMK);

    function copyToClipboard(elem) {
      // create hidden text element, if it doesn't already exist
      let targetId = "_hiddenCopyText_";
      let isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
      let origSelectionStart, origSelectionEnd;
      if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
      } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
          let target = document.createElement("textarea");
          target.style.position = "absolute";
          target.style.left = "-9999px";
          target.style.top = "0";
          target.id = targetId;
          document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
      }
      // select the content
      let currentFocus = document.activeElement;
      target.focus();
      target.setSelectionRange(0, target.value.length);

      // copy the selection
      let succeed;
      try {
        succeed = document.execCommand("copy");
      } catch (e) {
        succeed = false;
      }
      // restore original focus
      if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
      }
      if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
      } else {
        // clear temporary content
        target.textContent = "";
      }
      return succeed;
    } // end Copas


    $('.VRmode').on('touchstart click', function() {
      fullscreen.request(this.parentNode);
      window.screen.orientation.lock('landscape-primary');
      $('.VRmode').hide();
      $('.SwipeMode').show();
      $('.topBar').hide();
      $('svg#panolens-view-indicator-container').hide();
      // break;
      viewer.enableEffect(PANOLENS.MODES.CARDBOARD);
      viewer.enableControl(PANOLENS.CONTROLS.DEVICEORIENTATION);
    });

    $('.SwipeMode').on('touchstart click', function() { //fungsi exit fullscreen
      fullscreen.exit();
      $('.SwipeMode').hide();
      $('.VRmode').show();
      $('.topBar').show();
      $('svg#panolens-view-indicator-container').show();
      // break;
      viewer.disableEffect();
      viewer.enableControl(PANOLENS.CONTROLS.ORBIT);
    });

    $('.BackBtn').on('touchstart click', function() {
      window.history.back();
    });

    //tambah attribut pada koordinat
    // let koor = document.querySelector('#container div:nth-child(7)');
    // let att = document.createAttribute("title");
    // att.value = "Klik koordinat untuk menyalin";
    // koor.setAttributeNode(att);
    // //Event Untuk KLik Copy koordinat
    // koor.addEventListener("click", function() {
    //     copyToClipboard(koor);
    //     koor.innerHTML = "disalin";
    // });

    // copas
    // document.getElementById("koordinat").addEventListener("click", function() {
    //     copyToClipboard(document.getElementById("koordinat"));
    //     document.getElementById("koordinat").innerHTML = "disalin";
    // });
  </script>
</body>