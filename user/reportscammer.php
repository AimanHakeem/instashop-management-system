<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../login.php');
}
require '../dbconn.php';
require '../asset/user_session.php';

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

  <title>User's Panel</title>

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
    <?php require '../asset/sidebar-user.php'; ?>

    <!-- Page Content Holder -->
    <div id="content">

      <?php require '../asset/navbar-user.php'; ?>
      <h2 class="text-center">Report a Scammer</h2>
      <div class="line"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <form name="add" id="add_form" method="post" enctype="multipart/form-data" action="../lib/submitreport.php" style="width:500px;">
              <h3 class="text-center">Cheated Story</h3>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Date Occur</span>
                <div class="input-group date" data-provide="datepicker">
                  <input type="text" name="date_occur" required id="datepicker" class="form-control">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>
              <br/>
              <?php
              $id = $_SESSION['id_user'];
              echo '<input type="hidden" class="form-control" name="id_user" value='.$id.' aria-describedby="basic-addon1">';
              
              ?>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">How much money have been cheated </span>
                <input type="text" name="cheated_money" required class="form-control" value="RM"  aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <!--<span class="input-group-addon" id="basic-addon1">Related Image/Sceenshot</span>-->
                <div style="width: 500px;" class="panel panel-default">
                  <div class=" panel-heading">
                    Related Image / Sceenshot
                  </div>
                  <div class="panel-body">
                    <ol>
                      <li>Capture the bank slip/ Online transfer record</li>
                      <li>Chat history between you and the seller</li>
                      <li>A police report if had been made</li>
                    </ol>
                    <input type="file" required name="files[]" multiple accept="image/*" class="form-control">
                  </div>
                </div>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Cheated Story</span>
                <textarea class="form-control" required name="cheated_story" rows="4"></textarea>
              </div>
              <br/>
              <h3 class="text-center">Scammer Detail</h3>
              <div class="input-group">
                <span class="input-group-addon" > Name</span>
                <input type="text" class="form-control" required name="name" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" > Type of Service</span>
                <input type="text" class="form-control" required name="service" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> Phone Number</span>
                <input type="text" class="form-control" name="phone_no" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">IC No.</span>
                <input type="text" class="form-control" name="ic_no" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> Facebook URL</span>
                <input type="text" class="form-control" name="facebook" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> Instagram</span>
                <input type="text" class="form-control" name="instagram" aria-describedby="basic-addon1">
              </div>
              <br/>
              <h3 class="text-center">Scammer's Bank Details</h3>

              <table class="table table-bordered" id="dynamic_field">  
                <tr>  
                 <td> Holder Name</td>
                 <td><input type="text" name="holdername[]" required class="form-control name_list" /></td>
               </tr>
               <tr>
                 <td> Account No.</td>
                 <td><input type="text" name="bankaccount[]" required class="form-control name_list" /></td>
                 
               </tr>
               <tr>
                 <td>Bank Name</td>
                 <td>
                  <select id="banktype" name="banktype[]" class="form-control">
                  <option value="none" disabled selected>Select Scammer's Bank</option>
                  <option value="Maybank">Maybank</option>
                  <option value="CIMB">CIMB</option>
                  <option value="Bank Rakyat">Bank Rakyat</option>
                  <option value="RHB Bank">RHB Bank</option>
                  <option value="Bank Islam">Bank Islam</option>
                  <option value="Tabung Haji">Tabung Haji</option>
                  <option value="Hong Leong Bank">Hong Leong Bank</option>
                  <option value="Public Bank">Public Bank</option>
                  <option value="UOB">UOB</option>
                  <option value="Bank Muamalat">Bank Muamalat</option>
                  <option value="Affin Bank">Affin Bank</option>
                  <option value="AM Bank">AM Bank</option>
                  <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>  
                  <option value="Other">Other</option>
                </select>
                 </td>
                 <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
               </tr>  
             </table> 
                  <!--
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Bank</span>
                <select id="banktype" name="banktype[]" class="form-control">
                  <option value="none" disabled selected>Select Scammer's Bank</option>
                  <option value="Maybank">Maybank</option>
                  <option value="CIMB">CIMB</option>
                  <option value="Bank Rakyat">Bank Rakyat</option>
                  <option value="RHB Bank">RHB Bank</option>
                  <option value="Bank Islam">Bank Islam</option>
                  <option value="Tabung Haji">Tabung Haji</option>
                  <option value="Hong Leong Bank">Hong Leong Bank</option>
                  <option value="Public Bank">Public Bank</option>
                  <option value="UOB">UOB</option>
                  <option value="Bank Muamalat">Bank Muamalat</option>
                  <option value="Affin Bank">Affin Bank</option>
                  <option value="AM Bank">AM Bank</option>
                  <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>  
                  <option value="Other">Other</option>
                </select>
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> Holder Name</span>
                <input type="text" class="form-control" name="name[]" aria-describedby="basic-addon1">
              </div>
              <br/>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"> Account No.</span>
                <input type="text" class="form-control" name="accountno[]" aria-describedby="basic-addon1">
              </div>
              <br/>
              <button type="button" name="add" id="add" class="btn btn-success">Add More Bank</button>
            </tr>-->
            <br/>

            <center><button type="submit" name="btn_submit" class="btn btn-warning">Submit</button> <button type="reset" class="btn btn-danger">Reset</button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="line"></div>

    <p class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



  </div>
</div>






<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
   $('#sidebarCollapse').on('click', function () {
     $('#sidebar').toggleClass('active');
     $(this).toggleClass('active');
   });
 });
 $('#datepicker').datepicker();

 $(document).ready(function(){  
  var i=1;  
  $('#add').click(function(){  
   i++;  
   $('#dynamic_field').append('<tr id="row'+i+'"> <td> Holder Name</td> <td><input type="text" required name="holdername[]"   class="form-control name_list" /></td> </tr> <tr id="row'+i+'"> <td> Account No.</td> <td><input type="text" required name="bankaccount[]" class="form-control name_list" /></td></tr><tr id="row'+i+'"><td>Bank Name</td><td> <select id="banktype" name="banktype[]" class="form-control"> <option value="none" disabled selected>Select Bank Name</option> <option value="Maybank">Maybank</option> <option value="CIMB">CIMB</option> <option value="Bank Rakyat">Bank Rakyat</option> <option value="RHB Bank">RHB Bank</option> <option value="Bank Islam">Bank Islam</option> <option value="Tabung Haji">Tabung Haji</option> <option value="Hong Leong Bank">Hong Leong Bank</option> <option value="Public Bank">Public Bank</option> <option value="UOB">UOB</option> <option value="Bank Muamalat">Bank Muamalat</option> <option value="Affin Bank">Affin Bank</option> <option value="AM Bank">AM Bank</option> <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option> <option value="Other">Other</option> </select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
 });  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
 });  
  $('#submit').click(function(){            
   $.ajax({  
    url:"name.php",  
    method:"POST",  
    data:$('#add_name').serialize(),  
    success:function(data)  
    {  
     alert(data);  
     $('#add_name')[0].reset();  
   }  
 });  
 });  
});  
</script>
</body>
</html>
