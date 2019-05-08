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
</head>
<body>



  <div class="wrapper">
    <?php include '../asset/sidebar-admin.php' ?>

    <!-- Page Content Holder -->
    <div id="content">
      <?php include '../asset/navbar-admin.php'; ?>

      <h2>Welcome Admin!</h2>
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
          <div class="col-md-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h2>Information Board</h2>
              </div>
              <div class="panel-body">
                <?php 
                $stmt = $con->prepare('SELECT * FROM instashop WHERE status = 2');
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count) {
                  echo '<p><strong><font color="red">'.$count.'</font> of Trusted Instashop that have been approved.</strong></p>';
                }

                $sql = $con->prepare('SELECT * FROM scammer WHERE status = 1');
                $sql->execute();
                $count = $sql->rowCount();
                if ($count) {
                  echo '<p><strong><font color="red">'.$count.'</font> of Complained Scam Case.</strong></p>';  
                }

                $sqlst = $con->prepare('SELECT * FROM user');
                $sqlst->execute();
                $count1 = $sqlst->rowCount();
                if ($count1) {
                  echo '<p><strong><font color="red">'.$count1.'</font> of Registered User & Instashop.</strong></p>';
                }
                ?>
                
                
                

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h2>Notification Board</h2>
              </div>
              <div class="panel-body">
                <?php
                $sqlst = $con->prepare('SELECT * FROM instashop WHERE status = 1');
                $sqlst->execute();
                $count1 = $sqlst->rowCount();
                if ($count1) {
                  echo '<p><strong><font color="red">'.$count1.'</font> New Application for Trusted Instashop that need to be reviewed!</strong></p>';
                }
                else{
                  echo '<p><strong>No New Application for Trusted Instashop that need to be reviewed!</strong></p>';
                }
                $sqlst = $con->prepare('SELECT * FROM scammer WHERE status = 0');
                $sqlst->execute();
                $count1 = $sqlst->rowCount();
                if ($count1) {
                  echo '<p><strong><font color="red">'.$count1.'</font> New Complaints of Scam Case that need to be approved!</strong></p>';
                }
                else{
                  echo '<p><strong>No New Complaints of Scam Case that need to be approved!</strong></p>';
                }
                ?>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="line"></div>

      <p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



    </div>
  </div>

</body>
</html>
