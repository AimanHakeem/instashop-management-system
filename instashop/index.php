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

  <title>Instashop's Panel</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
</head>
<body>



  <div class="wrapper">
    <?php include '../asset/sidebar-instashop.php'; ?>
    <!-- Page Content Holder -->
    <div id="content">

      <?php include '../asset/navbar-admin.php' ?>
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
                <p> Welcome to Instashop Panel.</p>
                <p><li>Instashop able to apply trusted status of Instashop with related documents.</li></p>
                <p><li>All application will be reviewed by Admin in all aspects, and it may take some times to approve.</li></p>
                <p><li>Instashop allowed to re-send application if their application had been rejected, Admin will review again your profile and company profile.</li></p>
                <p><li>Current Status:  <?php 
                $id = $_SESSION['id_user'];
                $sql = $con->prepare('SELECT * FROM instashop where id_user = :id');
                $sql->bindParam(':id', $id, PDO::PARAM_INT);
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                  $status = $row['status'];
                  if ($status == '1') {
                    echo '<b> <font color="yellow">Application Pending</font></b>';
                  }
                  elseif ($status == '2') {
                    echo '<b> <font color="green">Trusted</font></b>';
                  }
                  elseif ($status == '3') {
                    echo '<b> <font color="orange">Not Trusted (Application Rejected)</font></b>';
                  }
                  else{
                    echo '<b><font color="red">Not Trusted</font></b>';
                  }
                }

                ?></li></p>
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






</body>
</html>
