<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../login.php');
}
require '../dbconn.php';
require '../asset/user_session.php';

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

  <title>User's Panel</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
</head>
<body>



  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php require '../asset/sidebar-user.php'; ?>

    <!-- Page Content Holder -->
    <div id="content">

    <?php require '../asset/navbar-user.php'; ?>
       <?php 
      if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo '<h2>Welcome '.$username.'!</h2>';
      }

      ?>
      <p>     
       <?php 
      if (isset($_SESSION['last_login'])) {
        $last = $_SESSION['last_login'];
        echo 'Last login <font color="red">'.$last.'</font>';
      }

      ?></p>

      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h2>Information Board</h2>
              </div>
              <div class="panel-body">
                <p> Welcome to User Panel.</p>
                <p><li>User can submit a complain with evidence to Admin and Admin will publish the scammer to public.</li></p>
                <p><li>All complain made will take some times for Admin to approve since it will be reviewed by Admin first before publish the report to public.</li></p>
                <p><li>Multiple report of scammer with same case will get <strong>permanent ban.</strong></li></p>
              </div>
            </div>
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
