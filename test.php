<!--
//index.php
!-->

<html>  
<head>  
  <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>  
<body>  
  <div class="container">
   <br />
   
   <br />
   <br />
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
  </div>
  <br />
  <form method="post" id="user_form">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>Bank Name</th>
       <th>Account Holder Name</th>
       <th>Account No.</th>
       <th>Remove</th>
     </tr>
   </table>
 </div>
 <div align="center">
   <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
 </div>
</form>

<br />
</div>
<div id="user_dialog" title="Add Data">
 <div class="form-group">
  <label>Enter First Name</label>
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Bank</span>
    <select id="banktype" name="banktype" class="form-control">
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
  <span id="error_banktype" class="text-danger"></span>
</div>
<div class="form-group">
  <label>Account Holder Name</label>
  <input type="text" name="account_holder" id="account_holder" class="form-control" />
  <span id="error_account_holder" class="text-danger"></span>
</div>
<div class="form-group">
  <label>Bank Account No.</label>
  <input type="text" name="account_no" id="account_no" class="form-control" />
  <span id="error_account_no" class="text-danger"></span>
</div>
<div class="form-group" align="center">
  <input type="hidden" name="row_id" id="hidden_row_id" />
  <button type="button" name="save" id="save" class="btn btn-info">Save</button>
</div>
</div>
<div id="action_alert" title="Action">

</div>
</body>  
</html> 

<script>  
  $(document).ready(function(){ 

   var count = 0;

   $('#user_dialog').dialog({
    autoOpen:false,
    width:400
  });

   $('#add').click(function(){
    $('#user_dialog').dialog('option', 'title', 'Add Bank Data');
    $('#banktype').val('');
    $('#account_holder').val('');
    $('#account_no').val('');
    $('#error_banktype').text('');
    $('#error_account_holder').text('')
    $('#error_account_no').text('');
    $('#banktype').css('border-color', '');
    $('#account_holder').css('border-color', '');
    $('#account_no').css('border-color', '');
    $('#save').text('Save');
    $('#user_dialog').dialog('open');
  });

   $('#save').click(function(){
    var error_banktype = '';
    var error_account_holder = '';
    var error_account_no = '';
    var banktype = '';
    var account_holder = '';
    var account_no = '';
    if($('#first_name').val() == '')
    {
     error_banktype = 'Please Select a Bank';
     $('#error_banktype').text(error_banktype);
     $('#banktype').css('border-color', '#cc0000');
     banktype = '';
   }
   else
   {
     error_banktype = '';
     $('#error_banktype').text(error_banktype);
     $('#banktype').css('border-color', '');
     banktype = $('#banktype').val();
   } 
   if($('#account_holder').val() == '')
   {
     error_account_holder = 'Account Holder Name is required!';
     $('#error_account_holder').text(error_account_holder);
     $('#account_holder').css('border-color', '#cc0000');
     account_holder = '';
   }
   else
   {
     error_account_holder = '';
     $('#error_account_holder').text(error_account_holder);
     $('#account_holder').css('border-color', '');
     account_holder = $('#account_holder').val();
   }
   if($('#account_no').val() == '')
   {
     error_account_no = 'Account No. is required!';
     $('#error_account_no').text(error_account_no);
     $('#account_no').css('border-color', '#cc0000');
     account_no = '';
   }
   else
   {
     error_account_no = '';
     $('#error_account_holder').text(error_account_holder);
     $('#account_holder').css('border-color', '');
     account_no = $('#account_no').val();
   }
   if(error_banktype != '' || error_account_holder != '' || error_account_no != '')
   {
     return false;
   }
   else
   {
     if($('#save').text() == 'Save')
     {
      count = count + 1;
      output = '<tr id="row_'+count+'">';
      output += '<td>'+banktype+' <input type="hidden" name="hidden_banktype[]" id="banktype'+count+'" class="banktype" value="'+banktype+'" /></td>';
      output += '<td>'+account_holder+' <input type="hidden" name="hidden_account_holder[]" id="account_holder'+count+'" value="'+account_holder+'" /></td>';
      output += '<td>'+account_no+' <input type="hidden" name="hidden_account_no[]" id="account_no'+count+'" value="'+account_no+'" /></td>';
      output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
      output += '</tr>';
      $('#user_data').append(output);
    }
    else
    {
      var row_id = $('#hidden_row_id').val();
      output += '<td>'+banktype+' <input type="hidden" name="hidden_banktype[]" id="banktype'+count+'" class="banktype" value="'+banktype+'" /></td>';
      output += '<td>'+account_holder+' <input type="hidden" name="hidden_account_holder[]" id="account_holder'+count+'" value="'+account_holder+'" /></td>';
      output += '<td>'+account_no+' <input type="hidden" name="hidden_account_no[]" id="account_no'+count+'" value="'+account_no+'" /></td>';
      output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
      $('#row_'+row_id+'').html(output);
    }

    $('#user_dialog').dialog('close');
  }
});

   $(document).on('click', '.view_details', function(){
    var row_id = $(this).attr("id");
    var banktype = $('#banktype'+row_id+'').val();
    var account_holder = $('#account_holder'+row_id+'').val();
    var account_no = $('#account_no'+row_id+'').val();
    $('#banktype').val(banktype);
    $('#account_holder').val(account_holder);
    $('#account_no').val(account_no);
    $('#save').text('Edit');
    $('#hidden_row_id').val(row_id);
    $('#user_dialog').dialog('option', 'title', 'Edit Data');
    $('#user_dialog').dialog('open');
  });

   $(document).on('click', '.remove_details', function(){
    var row_id = $(this).attr("id");
    if(confirm("Are you sure you want to remove this row data?"))
    {
     $('#row_'+row_id+'').remove();
   }
   else
   {
     return false;
   }
 });

   $('#action_alert').dialog({
    autoOpen:false
  });

   $('#user_form').on('submit', function(event){
    event.preventDefault();
    var count_data = 0;
    $('.banktype').each(function(){
     count_data = count_data + 1;
   });
    if(count_data > 0)
    {
     var form_data = $(this).serialize();
     $.ajax({
      url:"insert.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
       $('#user_data').find("tr:gt(0)").remove();
       $('#action_alert').html('<p>Data Inserted Successfully</p>');
       $('#action_alert').dialog('open');
     }
   })
   }
   else
   {
     $('#action_alert').html('<p>Please Add atleast one data</p>');
     $('#action_alert').dialog('open');
   }
 });

 });  
</script>