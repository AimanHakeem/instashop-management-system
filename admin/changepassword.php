<?php 
session_start();
if (!isset($_SESSION['id_user'])) {
  $id = $_SESSION['id_user'];
  header('location: ../login.php');
}
require '../dbconn.php';
require '../asset/admin_session.php';

?>
<!DOCTYPE html>
<html>
<style type="text/css">
  p.a {
    visibility: hidden;
}


</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin's Panel</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
</head>
<body>




  <div class="wrapper">
    <?php include '../asset/sidebar-admin.php' ?>

    <!-- Page Content Holder -->
    <div id="content">
      <?php include '../asset/navbar-admin.php'; ?>

      <h2 class="text-center">Change Password</h2>
      <div class="line"></div>
      <?php

    if(isset($_GET['stat'])){
        if($_GET['stat']==1){
        
          echo '  <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Success:</span> New password have been set!
        </div>';
      }
    }
    
      if(isset($_GET['stat'])){
        if($_GET['stat']==2){

          echo '  <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span> Please enter new password!
          </div>';
        }
      }
      if(isset($_GET['stat'])){
        if($_GET['stat']==3){

          echo '  <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span> Please enter the valid old password!
          </div>';
        }
      }
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form style="width:500px" method="post" action="../lib/admin_changepassword.php">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Old Password</span>
                <input type="password" class="form-control" name="password" required  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">New Password</span>
                <input type="password" class="form-control" name="npassword" required id="password" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Re-Type New Password</span>
                <input type="password" class="form-control" id="confirm_password" required aria-describedby="basic-addon1">
              </div>
              <br/>
              <center>
                <button type="submit" id="btn_submit" class="btn btn-warning">Submit</button>
                <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button></center>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
        <div class="line"></div>

        <p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>
    </div>
  </div> 
</body>




    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">


     var password = document.getElementById("password")
     , confirm_password = document.getElementById("confirm_password");

     function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
</body>
</html>
