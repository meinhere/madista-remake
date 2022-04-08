<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?= base_url() ?>/icons/fa/css/font-awesome.min.css">

  <script src="<?= base_url() ?>/js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url() ?>/js/three.min.js"></script>
  <script src="<?= base_url() ?>/js/panolens.min.js"></script>

  <title><?= $title ?></title>

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
      z-index: 100;
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
      height: 60px;
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
      position: absolute;
      left: 30%;
      top: 50px;
      background: rgba(255, 255, 255, .7);
      /*padding: 2px 5px;*/
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
    </div>
    <!-- <button class="VRmode">V R</button> -->
    <button class="SwipeMode">Tutup</button>
  </div>

  <script>
    var viewer, canvas, infospot;
    var _buttonVR = document.querySelector(".VRmode"),
      _buttonNormal = document.querySelector(".SwipeMode"),
      _titleIMG = document.querySelector('.topBar span');
    var fullscreen = {
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
    var room = new PANOLENS.ImagePanorama('<?= base_url('') ?>/img/ruang2.jpg');

    // Render Photo
    viewer = new PANOLENS.Viewer({
      container: canvas,
      controlBar: false,
      viewIndicator: true,
      indicatorSize: 35,
      output: 'console'
    });
    viewer.add(room);

    // Wonder women custom item
    var poster1 = new PANOLENS.Infospot(2700, '<?= base_url() ?>/img/sphere/Poster1.jpeg');
    var poster2 = new PANOLENS.Infospot(3500, '<?= base_url() ?>/img/sphere/Poster2.jpeg');
    var poster3 = new PANOLENS.Infospot(4000, '<?= base_url() ?>/img/sphere/Poster3.jpeg');
    var poster4 = new PANOLENS.Infospot(3500, '<?= base_url() ?>/img/sphere/Poster4.jpeg');
    var poster5 = new PANOLENS.Infospot(3000, '<?= base_url() ?>/img/sphere/Poster5.jpeg');
    poster1.position.set(72.79, 257.70, -4967.96);
    poster2.position.set(-4944.83, 189.58, -38.87);
    poster3.position.set(256.08, -4987.81, -174.72);
    poster4.position.set(108.80, 42.56, 4972.23);
    poster5.position.set(4976.73, 206.01, -289.53);
    room.add(poster1, poster2, poster3, poster4, poster5);


    function copyToClipboard(elem) {
      // create hidden text element, if it doesn't already exist
      var targetId = "_hiddenCopyText_";
      var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
      var origSelectionStart, origSelectionEnd;
      if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
      } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
          var target = document.createElement("textarea");
          target.style.position = "absolute";
          target.style.left = "-9999px";
          target.style.top = "0";
          target.id = targetId;
          document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
      }
      // select the content
      var currentFocus = document.activeElement;
      target.focus();
      target.setSelectionRange(0, target.value.length);

      // copy the selection
      var succeed;
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
      viewer.enableEffect(PANOLENS.MODES.CARDBOARD);
      viewer.enableControl(PANOLENS.CONTROLS.DEVICEORIENTATION);
    });
    $('.SwipeMode').on('touchstart click', function() { //fungsi exit fullscreen
      fullscreen.exit();
      $('.SwipeMode').hide();
      $('.VRmode').show();
      $('.topBar').show();
      $('svg#panolens-view-indicator-container').show();
      viewer.enableEffect(PANOLENS.MODES.NORMAL);
      viewer.enableControl(PANOLENS.CONTROLS.ORBIT);
    });

    $('.BackBtn').on('touchstart click', function() {
      window.history.back();
    });


    // copas
    // document.getElementById("koordinat").addEventListener("click", function() {
    //     copyToClipboard(document.getElementById("koordinat"));
    //     document.getElementById("koordinat").innerHTML = "disalin";
    // });

    //tambah attribut pada koordinat
    // var koor = document.querySelector('#container div:nth-child(7)');
    // var att = document.createAttribute("title");
    // att.value = "Klik koordinat untuk menyalin";
    // koor.setAttributeNode(att);
    //Event Untuk KLik Copy koordinat
    // koor.addEventListener("click", function() {
    //     copyToClipboard(koor);
    //     koor.innerHTML = "disalin";
    // });
  </script>
</body>