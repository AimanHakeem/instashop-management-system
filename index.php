
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Instashop Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
session_start();
if (!isset($_SESSION['username'])){

  require 'asset/navbar-main.php';

}
if (isset($_SESSION['username'])){
  require 'asset/navbar-main2.php';

}

?>

  <header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="text-uppercase">
            <strong>Your Favorite Reference System for Online Shopping in Instagram Platform</strong>
          </h2>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto">
          <p class="text-white mb-4">Why using Instashop Management System?</p>
          <p class="text-white mb-4">Internet made it easier for scammer to carry out their crimes. We made the system for user ensure that they never fall into scam. Our main focus is on Instagram platform.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#search1">Start Search for scammer or Trusted Instashop Account with us!</a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-primary" id="search1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading text-white">Search for Scammer</h2>
          <hr class="light my-4">
          <p class="text-faded mb-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Name / IC number / Account Bank Number</span>
              <input type="text" class="form-control"  aria-describedby="basic-addon1">
            </div></p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="">Search</a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
           <p class="text-faded mb-6">Disclaimer: All info is just for reference and will not responsible for any misleading.</p>
         </div>
       </div>
     </div>
   </section>

   <section id="search2">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Search for Trusted Instashop</h2>
          <hr class="my-4">
          <hr class="light my-4">
          <p class="text-faded mb-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Instashop Username</span>
              <input type="text" class="form-control"  aria-describedby="basic-addon1">
            </div></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="">Search</a>
          </div>
        </div>
            <div class="row">
              <div class="col-lg-8 mx-auto text-center">
                <p class="text-black mb-6">Disclaimer: All info is just for reference and will not responsible for any misleading.</p>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section class="bg-primary" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>010-1111999</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p >
              <a href="mailto:your-email@your-domain.com"><font color="black">help@ims.com</font></a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

  </html>
