<?php 
include '../dbconn.php';
session_start();

$sqlst = $con->prepare('SELECT * FROM user, user_detail WHERE user.id_user = user_detail.id_user');
$sqlst->execute();
$num = $sqlst->rowCount();
$n=1;
if($num){
	echo '<div class="table-responsive">';
	echo '<table id="example" id="mysdata" class="table table-striped">';
	echo '<thead><th>No.</th><th>Username</th><th>Name</th><th>Email</th><th>Address</th><th>City</th><th>Postcode</th><th>State</th><th>Suspend Acc.</th></thead><tbody>';
	$n=1;
	while($row = $sqlst->fetch(PDO::FETCH_ASSOC)){
		echo '<tr id="row'.$row['id_user'].'"><td>'.$n.'</td>';
		echo '<td>'.ucfirst($row['username']).'</td>';
		echo '<td>'.ucfirst($row['name']).'</td>';
		echo '<td>'.ucfirst($row['email']).'</td>';
		echo '<td>'.ucfirst($row['address']).'</td>';
		echo '<td>'.ucfirst($row['city']).'</td>';
		echo '<td>'.ucfirst($row['postcode']).'</td>';
		echo '<td>'.ucfirst($row['state']).'</td>';
		if ($row['suspend'] == 1) {
			echo '<td><a class="btn btn-success" role="button" href="../lib/user_unsuspend.php?id='.$row['id_user'].'""><i class="fa fa-times"> </i> Unsuspend</a></td></tr>';
		}
		else{
			echo '<td><a class="btn btn-danger" role="button" href="../lib/user_suspend.php?id='.$row['id_user'].'""><i class="fa fa-times"> </i> Suspend</a></td></tr>';
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

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

	<script>
		$('#mysdata').dataTable();
	</script>
