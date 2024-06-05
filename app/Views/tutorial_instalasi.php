<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SNPAD - Secured Notepad - Tutorial Instalasi &amp; Konfigurasi.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" >
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <a href="/"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <?php include('nav_bar.php'); ?>

    </div>
  </header><!-- #header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <div class="row about-container tutorial-container">

          <div class="col-lg-10 content order-lg-1 order-2">
            <h1>Tutorial</h1>
            <h3>Instalasi &amp; Konfigurasi</h3>
            <p>
              Langkah yang mudah untuk dilakukan khusus pada bagian Instalasi.
              Check Operating System kamu:
              <ul>
                <li>Windows</li>
                <li>Linux</li>
              </ul> 
            </p>

            <h4>Windows</h4>
            <p>
              1. Pastikan kamu sudah mendownload file : <b>setup_win.exe*</b> <br>
              2. Jalankan dengan privilledges tertinggi <b>"Run As Administrator".</b> <br>
              3. Tunggu hingga usai 100%.<br>
              4. Setelah itu akses Shortcut SNPad yg sudah tercipta di Desktop/Start Menu. <br> <br>
              
              <i>Notes: Installer akan menjalankan otomatis pembuatan shortcut hingga Runtime yg diperlukan.
              </i> <br>
            </p>

            <h5>Konfigurasi</h5>
            <p>Bagian ini hanya kamu lakukan jika setelah proses instalasi, program dijalankan dengan normal, namun tidak muncul tampilan GUI (window) apapun. Apa yang harus dilakukan? <br>
              1. Check di TaskManager (CTRL + ALT + DEL) <br>
              2. Pastikan tidak ada <b>OpenJDK (javaw.exe)</b> ataupun <b>snotepad.exe</b> sedang running.<br>
              3. Double Check di <b>Environment Variables :</b> <br>
               a. Start Menu | Ketik "Environment". <br>
               b. Klik "Edit the System Environment variables". <br>
               c. Klik "Environment Variables" <br>
               d. Pastikan ada Variable bernama <b>JAVA_HOME</b> <br>
               e. Pastikan ada Variable bernama <b>PATH</b> dengan nilai tambahan <b>%JAVA_HOME%\\bin</b> <br>
              4. Akses kembali Shortcut SNPad yg ada di Desktop/Start Menu.
            </p>

            <h4>Linux</h4>
            <p>
              1. Pastikan kamu sudah mendownload file : <b>setup_linux.zip**</b> <br>
              2. Extract file tersebut.<br>
              3. Tunggu hingga usai 100%.<br>
              4. Setelah itu akses file <b>SNPad.sh</b> dan kini SNPad siap digunakan! <br> <br>
              
              <i>Notes: File ini akan menjalankan SNotepad langsung secara portable.
              </i> <br>
            </p>  

            <h5>Konfigurasi</h5>
            <p>Tidak ada yg harus dilakukan.
            </p>

          </div>

        </div>

       
        </div>

    </section><!-- End About Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>