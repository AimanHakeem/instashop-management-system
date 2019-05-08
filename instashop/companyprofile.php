<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../login.php');
  $_SESSION['id_user'];
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

  <title>Submit Trusted Status</title>

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
        <div class="container-fluid">

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


      <h2 class="text-center">Trusted Status Application</h2>
      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8">
              <br/>
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
                $status = $row['status'];
                if ($status == '2') {
                      ?>
            <div class="panel panel-primary" style="width:665px;">
              <div class="panel-heading">
                <h2>Info</h2>
              </div>
              <div class="panel-body">
                <p><strong>Your trusted status has been approved. No document is needed currently.</strong></p>

                </div>
              </div>
                      <?php
                }
                elseif ($status == '3' || $status == '1'){
                  ?>
            <div class="panel panel-primary" style="width:665px;">
              <div class="panel-heading">
                <h2>Info</h2>
              </div>
              <div class="panel-body">
                <p><strong>You able to upload company profile or related document here.</strong></p>
                <p><strong>Upload multiple time if you have multiple related documents need to be upload.</strong></p>
                <p><strong>You are able to upload documents when your status is pending.</strong></p>
                <p><strong>Suggested format: .pdf, .docx, .doc</p>
                </div>
              </div>
                  <form method="post" action="../lib/upload_companyprofile.php" enctype="multipart/form-data" style="width:500px;">  
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
                      echo '<input type="hidden" class="form-control" name="id_user" value="'.$row['id_user'].'" aria-describedby="basic-addon1">';
                    }
                    ?>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Upload Company Profile or Related Document</span>
                      <span class="input-group-addon"><input type="file" name="ssmdocument" accept="application/pdf, .docx, .doc, application/msword" aria-describedby="basic-addon1"/> </span>

                    </div>

                    <br/>
                    <center><button type="submit" name="btn_submit" class="btn btn-warning">Submit</button> <button type="reset" class="btn btn-danger">Reset</button></center>
                  </form>
                  <?php
                }
                    else{
                      ?>
            <div class="panel panel-primary" style="width:665px;">
              <div class="panel-heading">
                <h2>Info</h2>
              </div>
              <div class="panel-body">
                <p><strong>Please submit application for trusted status to submit company profile.</strong></p>

                </div>
              </div>
                      <?php
                    }
              }
              ?>

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
