<?php 
include '../dbconn.php';
session_start();

$sqlst = $con->prepare('SELECT * FROM instashop, user WHERE user.id_user = instashop.id_user');
$sqlst->execute();
$num = $sqlst->rowCount();
$n=1;
if($num){
	echo '<div class="table-responsive">';
	echo '<table id="example" class="table table-striped"id="mysdata" >';
	echo '<thead>';
	echo '<th>No.</th><th>Username</th><th>Instagram</th><th>Email</th><th>SSM No.</th><th>Address</th><th>City</th><th>Postcode</th><th>State</th><th>Status</th><th>View Profile</th><th>Suspend Account</th></thead><tbody>';
	$n=1;
	while($row = $sqlst->fetch(PDO::FETCH_ASSOC)){
		echo '<tr id="row'.$row['id_user'].'"><td>'.$n.'</td>';
		echo '<td>'.ucfirst($row['username']).'</td>';
		echo '<td>'.ucfirst($row['instagram']).'</td>';
		echo '<td>'.ucfirst($row['email']).'</td>';
		echo '<td>'.ucfirst($row['ssm_no']).'</td>';
		echo '<td>'.ucfirst($row['company_address']).'</td>';
		echo '<td>'.ucfirst($row['city']).'</td>';
		echo '<td>'.ucfirst($row['postcode']).'</td>';
		echo '<td>'.ucfirst($row['state']).'</td>';
		if ($row['status'] == 1) {
			echo '<td><font color="orange">Application Pending (Not Trusted)</font></td>';	
		}
		elseif ($row['status'] == 2) {
			echo '<td><font color="green">Trusted</font></td>';	
		}
		elseif ($row['status'] == 3) {
			echo '<td><font color="orange">Application Rejected (Not Trusted)</font></td>';	
		}
		else{
			echo '<td><font color="red">Not Trusted</font></td>';
		}
		echo '<td><a class="btn btn-primary" role="button" href="../viewprofile.php?id='.$row['id_user'].'"><i class="fa fa-user"></i> View Profile</a></td>';
		if ($row['suspend'] == 1) {
			echo '<td><a class="btn btn-success" role="button" href="../lib/instashop_unsuspend.php?id='.$row['id_user'].'"><i class="fa fa-check"></i> Unsuspend</a></td> 
			</tr>';
		}
		else{
			echo '<td><a class="btn btn-danger" role="button" href="../lib/instashop_suspend.php?id='.$row['id_user'].'"><i class="fa fa-times"></i> Suspend</a></td> 
			</tr>';
		}
		$n++;
	}
	echo '</tbody></table>';
	echo '</div>';
}

?>
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