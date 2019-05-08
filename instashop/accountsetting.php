<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../login.php');
}
require '../dbconn.php';
require '../asset/instashop_session.php';

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

  <title>Account Setting</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
  <!--Font Awesome CDN -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include '../asset/sidebar-instashop.php'; ?>
    

    <!-- Page Content Holder -->
    <div id="content">

      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="navbar-btn">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
              <li><a href="../index.php">About</a></li>
              <li><a href="../index.php#search1">Search Scammer</a></li>
              <li><a href="../listofinstashop.php">List of Instashop</a></li>
              <li><a href="../index.php#search2">Search Instashop</a></li>
              <li><a href="../lib/act_logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <h2 class="text-center">Account Setting</h2>
      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
          <?php
          if(isset($_GET['stats'])){
            if($_GET['stats']==1){

              echo '  <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Success:</span> Instashop info successfully updated!
              </div>';
            }
          }
          if(isset($_GET['stats'])){
            if($_GET['stats']==2){

              echo '  <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span> Error updating Instashop info!
              </div>';
            }
          }
          if(isset($_GET['pass'])){
            if($_GET['pass']==1){

              echo '  <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Success:</span> Password successfully updated.
              </div>';
            }
          }
          if(isset($_GET['pass'])){
            if($_GET['pass']==2){

              echo '  <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span> New password does not match.
              </div>';
            }
          }
          if(isset($_GET['pass'])){
            if($_GET['pass']==3){

              echo '  <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span> Old password does not match.
              </div>';
            }
          }
          ?>
          <div class="col-md-4"></div>
          <div class="col-md-8">

            <form method="POST" action="../lib/edit_instashop.php" style="width:500px;" enctype="multipart/form-data">
              
              <br/>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM instashop WHERE id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  $picture = $row['profile_picture'];
                  if ($picture == '') {
                    echo '<center><img src="../img/default-profile.png" style="width: 120px; height: 150px;" class="img-circle" alt="Cinque Terre"></center> ';
                  }
                  else{

                  echo '<center><img src="../lib/img/'.$picture.'" style="width: 120px; height: 150px;" class="img-circle" alt="Cinque Terre"></center> ';
                }
              }
                ?>
                <br/>
              <div class="input-group">

                
                <span class="input-group-addon" id="basic-addon1">Upload Profile Picture</span>
                
                <span class="input-group-addon"><input type="file" id="productimage" name="productimage" accept="image/png, image/jpeg" aria-describedby="basic-addon1"/> </span>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> Username</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="hidden" class="form-control" name="id_user" value='.$row['id_user'].' aria-describedby="basic-addon1">';
                  echo '<input type="text" class="form-control" disabled="" value='.$row['username'].' aria-describedby="basic-addon1">';
                }
                ?>
              </div>


              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Instagram Username</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="instagram" value="'.$row['instagram'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Facebook</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="facebook" value="'.$row['facebook'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-globe"></i> Website</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="website" value="'.$row['website'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> Email</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="email" value="'.$row['email'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"></i> Phone Number</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="phone_number" value="'.$row['phone_number'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Service Provided</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="service_provided" value="'.$row['service_provided'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> SSM No.</i></span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="ssm_no" value="'.$row['ssm_no'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i> Company Address</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="company_address" value="'.$row['company_address'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i> City</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="city" value="'.$row['city'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i> Postcode</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="postcode" value="'.$row['postcode'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i> State</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="state" value="'.$row['state'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Year Involve</span>
                <?php
                $id = $_SESSION['id_user'];
                $sqlst = $con->prepare('SELECT * FROM user, instashop WHERE user.id_user = ? AND instashop.id_user = ?');
                $sqlst->bindParam (1,$id);
                $sqlst->bindParam (2,$id);
                $sqlst->execute();
                $num = $sqlst->rowCount();
                $n=1;
                if($num){
                  $row = $sqlst->fetch(PDO::FETCH_ASSOC);
                  echo '<input type="text" class="form-control" required name="year" value="'.$row['year_involved'].'" aria-describedby="basic-addon1">';
                }
                ?>
              </div>
              <br/>

              <center><button type="submit" name="btn_submit" id="btn_submit" class="btn btn-warning">Update</button> <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button></center>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <h3>Change Password</h3>
            <form method="post" action="../lib/instashop_changepassword.php" style="width:500px">

              <div class="input-group">

                <span class="input-group-addon" id="basic-addon1">Old Password</span>
                <input type="password" class="form-control" required name="password" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">New Password</span>
                <input type="password" class="form-control" required name="npassword" id="password" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Re-Type New Password</span>
                <input type="password" class="form-control" required id="confirm_password" name="confirm_password" aria-describedby="basic-addon1">
              </div>
              <br/>
              <center><button type="submit"  class="btn btn-warning">Change</button> <button type="reset" class="btn btn-danger">Reset</button></center>
            </form>
          </div>
        </div>
        <p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <!--<div class="col-md-6">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h2>Notification Board</h2>
              </div>
              <div class="panel-body">
                <p><strong><font color="red">8</font> New Application for Trusted Instashop that need to be reviewed!</strong></p>
                <p><strong><font color="red">3</font> New Complaints of Scam Case that need to be approved!</strong></p>
              </div>
            </div>
          </div>-->

        </div>
      </div>





      <!-- jQuery CDN -->
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <!-- Bootstrap Js CDN -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </body>
    </html>
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




         $(document).ready(function () {
         $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
           $(this).toggleClass('active');
         });
       });


     </script>