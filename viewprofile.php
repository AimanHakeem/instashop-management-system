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
          $id = $_GET['id'];
          $stmt = $con->prepare('SELECT * FROM instashop WHERE id_user = :id');
          $stmt->bindParam(':id',$id);
          $stmt->execute();
          $num = $stmt->rowCount();
          if ($num) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              echo '<h2 class="text-white section-heading">'.$row['instagram'].'`s Profile</h2>';
            }
          }
          if ((!isset($_GET['id'])) || ($_GET['id'] == '')) {
            header('location: listofinstashop.php');
          }
          ?>

          <hr class="light my-4">
          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Instashop Info</div>

            <!-- Table -->
            <table  class="table table-bordered">
              <?php
              $stmt = $con->prepare('SELECT * FROM instashop WHERE id_user = :id');
              $stmt->bindParam(':id',$id);
              $stmt->execute();
              $num = $stmt->rowCount();
              if ($num) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  if (isset($row['profile_picture'])) {
                    echo '<tr><td colspan="2"><center><img width="180" height="180" align="" src="lib/img/'.$row['profile_picture'].'"></center></td></tr>';
                  }
                  
                  echo '<tr><td>Instagram handle:</td><td>@'.$row['instagram'].'</td></tr>';
                  if ($row['status'] == '1') {

                    echo '<tr><td>Instashop Status:</td><td><b> <font color="orange">Application Pending</font></b></td></tr>';
                  }
                  elseif ($row['status'] == '2') {
                    echo '<tr><td>Instashop Status:</td><td><font color="green"><b>Trusted</b></font></td></tr>';
                  }
                  elseif ($row['status'] == '3') {
                    echo '<tr><td>Instashop Status:</td><td><font color="red"><b>Not Trusted(Application Rejected)</b></font></td></tr>';
                  }
                  else {
                    echo '<tr><td>Instashop Status:</td><td><font color="red"><b>Not Trusted</b></font></td></tr>';
                  }
                  echo '<tr><td>Facebook:</td><td>'.$row['facebook'].'</td></tr>';
                  echo '<tr><td>Website:</td><td>'.$row['website'].'</td></tr>';
                  echo '<tr><td>Email:</td><td>'.$row['email'].'</td></tr>';
                  echo '<tr><td>Phone No.:</td><td>'.$row['phone_number'].'</td></tr>';
                  echo '<tr><td>SSM No:</td><td>'.$row['ssm_no'].'</td></tr>';
                  echo '<tr><td>Address:</td><td>'.$row['company_address'].'</td></tr>';
                  echo '<tr><td>Postcode:</td><td>'.$row['postcode'].'</td></tr>';
                  echo '<tr><td>City:</td><td>'.$row['city'].'</td></tr>';
                  echo '<tr><td>State:</td><td>'.$row['state'].'</td></tr>';
                  echo '<tr><td>Service Provided:</td><td>'.$row['service_provided'].'</td></tr>';
                  echo '<tr><td>Year involved:</td><td>'.$row['year_involved'].' years</td></tr>';
                }
              }

              ?>
            </table>
          </div>

          <div class="panel panel-primary">
            <!-- Default panel contents -->
            <?php
            $id = $_GET['id'];
            $stmt = $con->prepare('SELECT * FROM instashop WHERE id_user = :id');
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num) {
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="panel-heading">'.$row['instagram'].'`s Feedback</div>';
              }
            }

            ?>
            <!-- Table -->
            <table  class="table table-bordered">
              <?php
              $id = $_GET['id'];
              $stmt = $con->prepare('SELECT * FROM feedback, user_detail WHERE feedback.id_user = user_detail.id_user AND feedback.id_instashop = :id');
              $stmt->bindParam(':id',$id);
              $stmt->execute();
              $num = $stmt->rowCount();
              if ($num) {
                $n = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr><td><b>Feedback #'.$n.'</b></td></tr>';
                  echo '<tr><td>Feedback by</td><td>'.$row['name'].'</td></tr>';
                  echo '<tr><td>Item</td><td>'.$row['item'].'</td></tr>';
                  echo '<tr><td>Feedback</td><td>'.$row['feedback'].'</td></tr>';
                  $rating = $row['rating'];
                  if ($rating == 1) {
                    $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    echo '<tr><td>Rating:</td><td>'.$star.'</td></tr>';
                  }
                  elseif ($rating == 2) {
                    $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    echo '<tr><td>Rating:</td><td>'.$star.$star.'</td></tr>';
                  }
                  elseif ($rating == 3) {
                    $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    echo '<tr><td>Rating:</td><td>'.$star.$star.$star.'</td></tr>';
                  }
                  elseif ($rating == 4) {
                    $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    echo '<tr><td>Rating:</td><td>'.$star.$star.$star.$star.'</td></tr>';
                  }
                  elseif ($rating == 5) {
                    $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    echo '<tr><td>Rating:</td><td>'.$star.$star.$star.$star.$star.'</td></tr>';
                  }

                  $n++;
                }
              }
              else{
                echo 'No feedback from user yet.';
              }
?>

            </table>
          </div>


            <!-- Table -->
            <?php 
            if (isset($_SESSION['id_role'])) {
              $role = $_SESSION['id_role'];
            }
            
            if ((isset($role)) && isset($id) ){
            if ($role == '4') {
              ?>
                        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Leave Feedback</div>
              <table  class="table table-bordered">
              <form method="post" action="lib/add_feedback.php">
                <tr>
                  <?php 
                  $id = $_SESSION['id_user'];
                  $idinstashop = $_GET['id'];
                  echo '<input type="hidden" class="form-control" name="id_user" value='.$id.' aria-describedby="basic-addon1">';
                  echo '<input type="hidden" class="form-control" name="id_instashop" value='.$idinstashop.' aria-describedby="basic-addon1">';
                  ?>
                  <td>Feedback </td><td><textarea required name="feedback" rows="2" class="form-control"></textarea></td>
                </tr>
                <tr>
                  <td>Goods / Service Purchased </td><td><input type="text" required class="form-control" name="item"></td>
                </tr>
                <tr>
                  <td>Rating </td>
                  <td>
                    <fieldset class="rating">
                      <input required type="radio" id="star5" name="rating" value="5" /><label for="star5">5 stars</label>
                      <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 stars</label>
                      <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 stars</label>
                      <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 stars</label>
                      <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
                    </fieldset>
                  </td>
                </tr>
                <tr>
                  <td><button type="submit" id="btn_submit" class="btn btn-info">Submit</button>
                    <button type="reset" id="btn_reset" class="btn btn-danger">Reset</button></center></td>
                  </tr>
                </form>
              </table>
            <?php
          }
        }
        else{
          echo '<strong>Please Sign in to leave feedback.</strong>';
        }
            ?>
            
            </div>
            <center><button class="btn btn-primary" onclick="history.go(-1);">Back </button></center>
          </div>
        </div>
      </div>
    </section>



  </body>

  </html>
