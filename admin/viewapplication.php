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





  <div class="wrapper">
    <?php include '../asset/sidebar-admin.php' ?>

    <!-- Page Content Holder -->
    <div id="content">
      <?php include '../asset/navbar-admin.php'; ?>

      <h2 class="text-center">Application of Trusted Status</h2>
      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-lg-12">
            <br/>
            <table class="table table-striped">
                <div id="get_application"></div>
            </table>
          </div>
        </div>
      </div>
      <div class="line"></div>
<p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>






  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
       $('#sidebar').toggleClass('active');
       $(this).toggleClass('active');
     });
     });
     $(document).ready(function(){
      $.ajax({
        async: true,
        type:"POST",
        url:"../lib/get_application.php",
        datatype:"HTML",
        success:function(data){
          $('#get_application').append(data);
        }
      });
    });

  </script>
</body>
</html>
