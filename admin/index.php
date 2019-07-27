<?php
mysql_connect('localhost','root','');
mysql_select_db('dbtokoonline');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">

</head>

<body>


  <!-- Masthead -->
  <header class="masthead text-white text-center py-5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">TOKO INA</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-12 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="ketik sesuatu yang andar cari...">
              </div>
              <div class="col-12 col-md-3">
                <!-- <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

<!--   <nav class="navbar navbar-light bg-primary">
    <div class="container">
      <h3>Home</h3>
    </div>
  </nav> -->
  <section class="py-5" id="seks">
    <div class="container">
      <div class="row" id="isi">
        
      </div>
    </div>
  </section>
  <!-- Icons Grid -->
  <section class="features-icons bg-dark text-center text-white py-5">
      <div class="row">
        <div class="col-md-12">
          <h2>Pilih Menu</h2>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-user m-auto text-primary"></i>
            </div>
            <h3>Pelanggan</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="far fa-building m-auto text-primary"></i>
            </div>
            <h3>Produk</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="icon-briefcase m-auto text-primary"></i>
            </div>
            <h3>Kategori</h3>
            <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="icon-basket-loaded m-auto text-primary"></i>
            </div>
            <h3>Keranjang</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="icon-bag m-auto text-primary"></i>
            </div>
            <h3>Transaksi</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="icon-chart m-auto text-primary"></i>
            </div>
            <h3>Laporan</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 menu">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-sign-out-alt m-auto text-primary"></i>
            </div>
            <h3>Keluar</h3>
          <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
          </div>
        </div>
      </div>
  </section>

  <?php include "page/isi.php";?>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="toko.js"></script>
  <?php include "java.php";?>
</body>

</html>
