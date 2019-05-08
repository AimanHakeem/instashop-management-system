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

<body id="page-top" class="bg-primary">

  <!-- Navigation -->
  <?php require'asset/navbar.php';
  ?>

  <div class="container my-auto text-white text-center">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>

          <h2 class="text-uppercase">
            <strong>Instashop Registration Form</strong>
          </h2>
          <form id="instashop" method="POST" action="lib/instashop_register.php" enctype="multipart/form-data" accept-charset="utf-8">
          <hr>
        </div>
        <div class="col-lg-6 mx-auto">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"> Username</i></span>
            <input type="text" class="form-control" required name="username"  aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog"> Password</i> </span>
            <input type="password" class="form-control" required name="password"  aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-instagram"> Instagram Username </i></span>
            <input type="text" class="form-control" name="iusername" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-facebook"> Facebook Page</i></span>
            <input type="text" class="form-control" name="fbusername" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-globe"> Website</i></span>
            <input type="text" class="form-control" name="website" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"> Email</i></span>
            <input type="text" class="form-control" name="email" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"> Phone Number</i></span>
            <input type="text" class="form-control" name="phone" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-file"> SSM Account</i></span>
            <input type="text" class="form-control" name="ssm" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"> Company Address</i></span>
            <input type="text" class="form-control" name="address" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"> City</i></span>
            <input type="text" class="form-control" name="city" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"> Postcode</i></span>
            <input type="text" class="form-control" name="postcode" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"> State</i></span>
            <input type="text" class="form-control" name="state" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">What kind of service you provide?</span>
            <input type="text" class="form-control" name="service" required aria-describedby="basic-addon1">
          </div>
          <br/>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">How many years you involved in Instagram?</span>
            <input type="text" class="form-control" name="year" required aria-describedby="basic-addon1">
          </div>
          <br/>
            <button type="submit" id="btn_submit" class="btn btn-warning">Register</button>
            <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button>
        </div>
      </form>
      </div>
    </div>


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
