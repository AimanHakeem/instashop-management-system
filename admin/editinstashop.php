<?php 
session_start();
if (!isset($_SESSION['username'])) {
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
  <!--Font Awesome CDN -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>




  <div class="wrapper">
    <?php include '../asset/sidebar-admin.php' ?>

    <!-- Page Content Holder -->
    <div id="content">
      <?php include '../asset/navbar-admin.php'; ?>

      <h2 class="text-center">Edit Instashop</h2>
      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <form style="width:500px;">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Upload Profile Picture</span>
                <input type="text" disabled class="form-control" aria-describedby="basic-addon1">
                <span class="input-group-addon"><a href="#"><i class="fa fa-folder"></i> Upload</a> </span>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"> Username</i></span>
                <input type="text" class="form-control" disabled="" value="store_box" aria-describedby="basic-addon1">
              </div>
              

              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Instagram Username</span>
                <input type="text" class="form-control" value="@store_box"  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Service Provided</span>
                <input type="text" class="form-control" value="Men's Clothing"  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"> Website</i></span>
                <input type="text" class="form-control" value="-" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"> Email</i></span>
                <input type="text" class="form-control" value="store_box@gmail.com" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"> Phone Number</i></span>
                <input type="text" class="form-control" value="0107077167"  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"> SSM No.</i></span>
                <input type="text" class="form-control" value="SA0367529-A"  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true">Company Address</i></span>
                <textarea class="form-control" rows="3" aria-describedby="basic-addon1"></textarea>
              </div>
              <br/>
              <center><a class="btn btn-warning btn-s js-scroll-trigger" href="#search1">Update</a> <a class="btn btn-primary btn-s js-scroll-trigger" href="#search1">Reset</a></center>
            </form>
          </div>
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
      <div class="line"></div>


      <p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


    </div>
  </div>





  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
   $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
       $('#sidebar').toggleClass('active');
       $(this).toggleClass('active');
     });
   });
 </script>
</body>
</html>
