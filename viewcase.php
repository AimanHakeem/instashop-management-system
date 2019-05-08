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
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">

</head>

<body>

  <!-- Navigation -->
  <?php 

  require 'dbconn.php';
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
          $case = $_GET['id'];
          echo '<h2 class="text-white section-heading">Case No. '.$case.'</h2>'
          ?>

          <hr class="light my-4">
          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Scammer Info</div>

            <!-- Table -->
            <table  class="table table-bordered">
              <?php
              $stmt = $con->prepare('SELECT * FROM scammer WHERE report_number = :id');
              $stmt->bindParam(':id',$case);
              $stmt->execute();
              $num = $stmt->rowCount();
              if ($num) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr><td>Date Occur:</td><td>'.$row['date_occur'].'</td></tr>';
                  echo '<tr><td>Money Scammed:</td><td>'.$row['cheated_money'].'</td></tr>';
                  echo '<tr><td>Cheated Story:</td><td>'.$row['cheated_story'].'</td></tr>';
                  echo '<tr><td>Scammer Name:</td><td>'.$row['name'].'</td></tr>';
                  echo '<tr><td>Service Provided by Scammer:</td><td>'.$row['service'].'</td></tr>';
                  echo '<tr><td>Phone Number:</td><td>'.$row['phone_no'].'</td></tr>';
                  echo '<tr><td>IC No.:</td><td>'.$row['ic_no'].'</td></tr>';
                  echo '<tr><td>Instagram:</td><td>'.$row['instagram'].'</td></tr>';
                }
              }

              ?>
            </table>
          </div>
          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Scammer Bank Info</div>

            <!-- Table -->
            <table  class="table table-bordered">
              <?php
              $stmt = $con->prepare('SELECT * FROM scammer_bank WHERE report_no = :id');
              $stmt->bindParam(':id',$case);
              $stmt->execute();
              $num = $stmt->rowCount();
              if ($num) {
                $n = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr><td><b>Bank Account #'.$n.'</b></td></tr>';
                  echo '<tr><td>Bank Name:</td><td>'.$row['bank_name'].'</td></tr>';
                  echo '<tr><td>Account Holder:</td><td>'.$row['account_holder'].'</td></tr>';
                  echo '<tr><td>Account No.:</td><td>'.$row['bank_account'].'</td></tr>';
                  $n++;
                }
              }

              ?>
            </table>
          </div>
          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Scammer Proof</div>

            <!-- Table -->
            <table  class="table table-bordered">
              <?php
              $stmt = $con->prepare('SELECT * FROM scammer_proof WHERE report_no = :id');
              $stmt->bindParam(':id',$case);
              $stmt->execute();
              $num = $stmt->rowCount();
              if ($num) {
                $n=1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr><td>Attachment '.$n.':</td><td><a href="lib/img/'.$row['proof'].'">Download Here</a></td></tr>';
                  $n++;
                }
              }
              ?>
            </table>
          </div>
          <center><button class="btn btn-primary" onclick="history.go(-1);">Back </button></center>
          </div>
        </div>
      </div>
    </section>



  </body>

  </html>
