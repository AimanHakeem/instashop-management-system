<?php 
session_start();
if (isset($_SESSION['username'])) {
  $role = $_SESSION['id_role'];

  if($role == '1'){
    header('location: admin/adminpanel.php');
  }
  elseif ($role == '2') {
    header('location: instashop/index.php');
  }
  elseif ($role == '3') {
    header('location: index.php');
  }  
}
/*else{
header('');
}*/
require 'dbconn.php';
//require '../asset/admin_session.php';

?>
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

  <?php require'asset/navbar.php';
  ?>
  <form id="login" method="post" action="lib/act_login.php">
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 mx-auto">
            <?php
            if(isset($_GET['success'])){
              if($_GET['success']==1){
                
                echo '  <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span> User Successfully Registered!
                </div>';
              }
            }
            if(isset($_GET['stat'])){
              if($_GET['stat']==2){
                
                echo '  <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span> Username or Password entered not match!
                </div>';
              }
            }
            if(isset($_GET['stat'])){
              if($_GET['stat']=='bye'){
                
                echo '  <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span> User has successfully logout!
                </div>';
              }
            }
            ?>
          </div>
          <div class="col-lg-10 mx-auto">
            
            <h2 class="text-uppercase">

              <strong>Login</strong>
            </h2>
            <hr>
          </div>


          <div class="col-lg-4 mx-auto">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Username</span>
              <input type="text" class="form-control" required name="username" aria-describedby="basic-addon1">
            </div>
            <br/>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Password</span>
              <input type="password" class="form-control" required name="password"  aria-describedby="basic-addon1">
            </div>
            <br/>
            <button type="submit" id="btn_submit" class="btn btn-warning">Login</button>
            &nbsp; &nbsp; &nbsp; &nbsp; 
            <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button>
          </div>
        </div>

      </div>
    </header>
  </form>

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
