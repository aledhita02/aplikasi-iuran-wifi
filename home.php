<?php
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laskar Online Web</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/web/assets/img/favicon.png" rel="icon">
  <link href="assets/web/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/web/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/web/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/web/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/web/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/web/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/web/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/web/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Groovin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Laskar Online</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/web/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#pengumuman">Pengumuman</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade vh-100" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/web/assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">SELAMAT DATANG DI WEBSITE LASKAR ONLINE</h2>
                <p class="animate__animated animate__fadeInUp">Pusat Layanan Informasi Terpercaya RT/RW : 003/009 Desa Karang Asih</p>
                <div>
                  <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/web/assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">LASKAR ONLINE</h2>
                <p class="animate__animated animate__fadeInUp">Menginspirasi, Menggerakkan, Membangun Masyarakat yang Kreatif dan Inovatif</p>
                <div>
                  <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</a>
                </div>
              </div>
            </div>
          </div>
          
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!--==========================
      Pengumaman Section
    ============================-->
    <section id="pengumuman" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Pengumuman</h2>
        </div>

        <div class="row">
          <?php
          $no = 1;
          $sql = $koneksi->query("select * from tb_pengu");
          while ($data = $sql->fetch_assoc()) {
          ?>
            <div class="col-lg-3 col-md-4 wow fadeInUp">
              <div class="card mb-3">
                <div class="card-header bg-success text-white text-center">
                  <h4><b><?php echo $data['judul']; ?></b></h4>
                </div>
                <div class="card-body">
                  <p class="card-text"><?php echo $data['isi']; ?></p>
                  <p class="card-text text-success"><?php echo date('l, d F Y', strtotime($data['tanggal'])); ?></p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- #pengumuman -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Presented By</h2>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6 mx-auto">
            <div class="member">
              <img src="assets/web/assets/img/team/team.jpg" class="img-fluid border" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Kenny Corenthian</h4>
                  <span>Fullstack Web Developer</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>RT 003, RW 009, Ds. Karang Asih, Kec. Cikarang Utara, Kab. Bekasi, Jawa Barat 17530</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+62 813 8367 8731</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">corenthiankenny2015@gmail.com</a></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Groovin</h3>
              <p>
              RT 003, RW 009, Ds. Karang Asih, Kec. Cikarang Utara<br>
              Kab. Bekasi, Jawa Barat 17530<br><br>
                <strong>Phone:</strong> +62 813 8367 8731<br>
                <strong>Email:</strong> corenthiankenny2015@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Info Penting</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Puskesmas : (021) 89106060</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Polsek : (021) 8901217</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Damkar : (021) 89239900</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PLN setempat : 123</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Tentang Kami</h4>
            <p>Website Laskar Online RT 003/RW 009 Ds. Karang Asih, Kec. Cikarang Utara. Kab. Bekasi, Jawa Barat, 17530. Saluran komunikasi terpercaya dan terbuka untuk umum</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Kenny</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">Ken</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/web/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/web/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/web/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/web/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/web/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/web/assets/js/main.js"></script>

</body>

</html>