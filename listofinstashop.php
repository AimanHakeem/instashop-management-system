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

<body class="bg-info">

  <!-- Navigation -->
<?php 
session_start();
if (!isset($_SESSION['username'])){

  require 'asset/navbar-main.php';

}
if (isset($_SESSION['username'])){
  require 'asset/navbar-main2.php';

}
?>

  <section class="bg-info" id="listofscammer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto text-center">
          <h2 class="text-white section-heading">List of Instashop</h2>
          <hr class="light my-4">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-11">
          <div id="get_instashop"></div>
        </div>
      </div>
    </div>
  </section>

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
  <script type="text/javascript">
   $(document).ready(function(){
    $.ajax({
      type:"POST",
      url:"lib/get_instashop1.php",
      datatype:"HTML",
      success:function(data){
        $('#get_instashop').append(data);
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').dataTable();
  } );
</script>
<div class="table-responsive no-margin">
  <style type="text/css">

  .table.dataTable.no-footer {
    border-bottom: 1px solid #D7CCCC !important;
    .table.dataTable thead th, table.dataTable thead td {
      padding: 10px 18px;
      border-bottom: 1px solid #D7CCCC !important;

      table, tr, th{
        background-color: white;
      }

      thead{
        background-color: white;
      }



    }
  </style>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

  <script>
    $('#mysdata').dataTable();
  </script>