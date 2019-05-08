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

    <div class="row">
      <div class="col-lg-10 mx-auto">

        <h2 class="text-uppercase">
          <br/>
          <br/>
          <strong>User Registration Form</strong>
        </h2>
        <?php
        if(isset($_GET['stats'])){
          if($_GET['stats']==1){

            echo '  <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span> Username already exist!
            </div>';
          }
        }
        if(isset($_GET['stats'])){
          if($_GET['stats']==2){

            echo '  <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span> Email already exist please use other email!
            </div>';
          }
        }
        ?>
        <form style="width:500px;" id="" method="post" action="lib/user_register.php" enctype="multipart/form-data" accept-charset="utf-8">
        <hr>
        </div>

        <div class="col-lg-6 mx-auto">
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"> Username</i></span>
        <input type="text" class="form-control" name="username" required aria-describedby="basic-addon1">
        </div>
        <br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cog"> Password</i> </span>
        <input type="password" class="form-control"  name="password" required aria-describedby="basic-addon1">
        </div>
        <br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Name</span>
        <input type="text" class="form-control" name="name" required aria-describedby="basic-addon1">
        </div>
        <br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Gender</span>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <label class="radio-inline"><input type="radio" value="Male" name="gender"> &nbsp; &nbsp;Male</label>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <label class="radio-inline"><input type="radio" value="Female" name="gender"> &nbsp; &nbsp;Female</label>
        </div>
        <br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Age</span>
        <input type="text" class="form-control" name="age" required  aria-describedby="basic-addon1">
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
        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"> Address</i></span>
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
        <button type="submit" id="btn_submit" class="btn btn-warning">Register</button>
        <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </header>

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
