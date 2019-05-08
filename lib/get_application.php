<?php 
include '../dbconn.php';
session_start();

$sqlst = $con->prepare('SELECT DISTINCT * FROM instashop, user WHERE user.id_user = instashop.id_user AND instashop.status = "1"');
$sqlst->execute();
$num = $sqlst->rowCount();
$n=1;
if($num){
	echo '<div  class="table-responsive">';
	echo '<table id="example" id="mysdata" class="table table-striped">';
	echo '<thead><th>No.</th><th>Username</th><th>Instagram</th><th>Email</th><th>Type of Service</th><th>SSM No.</th><th>Date Submit</th><th>Documents</th><th>View Profile</th><th>Approve</th><th>Decline</th></thead><tbody>';
	$n=1;
	while($row = $sqlst->fetch(PDO::FETCH_ASSOC)){
		echo '<tr id="row'.$row['id_user'].'"><td>'.$n.'</td>';
		echo '<td>'.ucfirst($row['username']).'</td>';
		echo '<td>'.ucfirst($row['instagram']).'</td>';
		echo '<td>'.ucfirst($row['email']).'</td>';
		echo '<td>'.ucfirst($row['service_provided']).'</td>';
		echo '<td>'.ucfirst($row['ssm_no']).'</td>';
		echo '<td>'.ucfirst($row['date_submit']).'</td>';
		echo '<td><a class="btn btn-warning" role="button" href="viewdocument.php?id='.$row['id_user'].'"><i class="fa fa-file"></i> View Documents</a></td>';
		echo '<td><a class="btn btn-primary" role="button" href="../viewprofile.php?id='.$row['id_user'].'"><i class="fa fa-user"></i> View Profile</a></td>';
		echo '<td><a class="btn btn-success" role="button" href="../lib/approve_instashop.php?id='.$row['id_user'].'"><i class="fa fa-check"></i> Approve</a></td> <td><a class="btn btn-danger" role="button" href="../lib/reject_application.php?id='.$row['id_user'].'"><i class="fa fa-times"></i> Decline</a></td></tr>';
		$n++;
	}
	echo '</tbody></table>';
	echo '</div>';
}
else{
	echo '<center> No New Application currently.</center>';
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