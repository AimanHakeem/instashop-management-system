<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Instashop profile</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
  <!--Font Awesome CDN -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



  <div id="content">

    <?php 
    session_start();
    if (!isset($_SESSION['username'])){

      require 'asset/navbar-user.php';

    }
    if (isset($_SESSION['username'])){
      require 'asset/navbar-user.php';

    }
    ?>

    <div class="line"></div>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2>Store_box's Profile</h2>
            </div>
            <div class="panel-body">
              <center>
                <form style="width: 500px;">
                  <center><img src="img/default-profile.png" style="width: 120px; height: 150px;" class="img-circle" alt="Cinque Terre"></center><br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"> Username</i></span>
                    <input type="text" class="form-control" disabled="" value="store_box" aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Instagram Username</span>
                    <input type="text" class="form-control" disabled="" value="@store_box"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Service Provided</span>
                    <input type="text" class="form-control" disabled="" value="Men's Clothing"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"> Website</i></span>
                    <input type="text" class="form-control" disabled="" value="-" aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"> Email</i></span>
                    <input type="text" class="form-control" disabled="" value="store_box@gmail.com" aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"> Phone Number</i></span>
                    <input type="text" class="form-control" disabled="" value="0107077167"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"> SSM No.</i></span>
                    <input type="text" class="form-control" disabled="" value="SA0367529-A"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true">Company Address</i></span>
                    <textarea class="form-control" rows="3" disabled="" aria-describedby="basic-addon1">15b, Jalan Cheras Baru, Taman Cheras Indah, 56000 Cheras, Kuala Lumpur.</textarea>
                  </div>
                  <br/>
                </form></center>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h2>Store_box's Feedback</h2>
              </div>
              <div class="panel-body">
                <center>
                  <table class="table table-striped">
                    <th>No.</th>
                    <th>Feedback by</th>
                    <th>Feedback</th>
                    <th>Service</th>
                    <th>Rating</th>
                    <tr>
                      <td>1.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>3.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>4.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>5.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>6.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>7.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>8.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>9.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr> 
                    <tr>
                      <td>10.</td>
                      <td>aimanhakeem</td>
                      <td>Recommended instashop, fast delivery & item is in good condition!</td>
                      <td>Nike Flyknit Racer Size US10</td>
                      <td><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></td>
                    </tr>              
                  </table>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="line"></div>

    </div>
  </div>  
</body>
</div>





<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
