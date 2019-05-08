<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Instashop Management System</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Our Custom CSS -->

  <link rel="stylesheet" type="text/css" href="asset/rating.css">
</head>

<body>

  <!-- Navigation -->
  <?php 
  session_start();
  require '../dbconn.php';
  ?>

  <section class="" id="listofscammer">
    <div class="container">
      <div class="row">
        <br/>
        <br/>
        <br/>
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <?php
          $id = $_GET['id'];
          $stmt = $con->prepare('SELECT * FROM instashop WHERE id_user = :id');
          $stmt->bindParam(':id',$id);
          $stmt->execute();
          $num = $stmt->rowCount();
          if ($num) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              echo '<h2 class="text-white section-heading">'.$row['instagram'].'`s Documents</h2>';
            }
          }
          if ((!isset($_GET['id'])) || ($_GET['id'] == '')) {
            header('location: admin/adminpanel.php');
          }
          ?>

          <hr class="light my-4">

            <!-- Default panel contents -->


            <!-- Table -->
            <?php
            $stmt = $con->prepare('SELECT * FROM document, instashop WHERE document.id_user = instashop.id_user AND document.id_user = :id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num) {
              echo '<div  class="table-responsive">';
              echo '<table id="example" id="mysdata" class="table table-striped">';
              echo '<thead><th>No.</th><th>Document Type</th><th>Document</th><th>Date Upload</th></thead><tbody>';
              $n=1;
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr id="row'.$row['id_user'].'"><td>'.$n.'</td>';
                echo '<td>'.ucfirst($row['document_type']).'</td>';
                echo '<td><a href="../lib/document/'.$row['document'].'">'.$row['document'].'</a></td>';
                echo '<td>'.ucfirst($row['date_upload']).'</td>';
                $n++;
              }
              echo '</tbody></table>';
              echo '</div>';
            }
            else{
              echo '<center> No Document found.</center>';
            }

            ?>


        <center><button class="btn btn-primary" onclick="history.go(-1);">Back </button></center>
      </div>
    </div>
  </div>
</section>



</body>

</html>
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