<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Scammer's profile</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style5.css">
  <!--Font Awesome CDN -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



  <div class="wrapper">

    <!-- Page Content Holder -->


<?php 
session_start();
if (!isset($_SESSION['username'])){

  require 'asset/navbar-main.php';

}
if (isset($_SESSION['username'])){
  require 'asset/navbar-main2.php';

}


?>
    <div class="line"></div>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h2>Scammer's Profile</h2>
            </div>
            <div class="panel-body">
              <center>
                <form style="width: 500px;">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"> Reported by</i></span>
                    <input type="text" class="form-control" disabled="" value="FadhliRozman" aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Instagram Username</span>
                    <input type="text" class="form-control" disabled="" value="@xtreme_motosport"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Service Provided</span>
                    <input type="text" class="form-control" disabled="" value="Car Sparepart"  aria-describedby="basic-addon1">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"> Scammer's Name</span>
                    <input type="text" class="form-control" disabled="" value="Mohd Fathuddin Bin Razali" aria-describedby="basic-addon1">
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
                    <span class="input-group-addon" id="basic-addon1"> SSM No.</span>
                    <input type="text" class="form-control" disabled="" value="-"  aria-describedby="basic-addon1">
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
                <h2>Scammer's Bank Account</h2>
              </div>
              <div class="panel-body">
                <center>
                <form style="width: 500px;">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"> Bank</span>
                  <input type="text" class="form-control" disabled="" value="Maybank"  aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"> Account No.</span>
                  <input type="text" class="form-control" disabled="" value="14512587844"  aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"> Money Fraud Ammount</span>
                  <input type="text" class="form-control" disabled="" value="RM1200"  aria-describedby="basic-addon1">
                </div>
                <div style="width: 500px;" class="panel panel-default">
                  <div class=" panel-heading">
                    Related Image / Sceenshot
                  </div>
                  <div class="panel-body">
                    <ol>
                      <li>Pictures that related to the case will appear here.</li>
                      <li></li>
                      <li></li>
                    </ol>
                  </div>
                </div>
              </form>
            </center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="line"></div>


    </div>  
  </body>
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
