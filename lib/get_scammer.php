<?php
require '../dbconn.php';



$stmt = $con->prepare('SELECT * FROM scammer WHERE status = 1');
$stmt->bindParam(':id',$id);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
	echo '<div class="table-responsive">';
	echo '<table style="width: 900px; id="example" id="mysdata" class="table table-striped">';
	echo '<thead><th>No.</th><th>Report No.</th><th>Date Occured</th><th>Cheated Money</th><th>Scammer Name</th><th>Service</th><th>Date Submitted</th><th>View Report</th></thead><tbody>';
	$n = 1;
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr id="row'.$row['id_user'].'"><td>'.$n.'</td>';
		echo '<td>'.$row['report_number'].'</td>';
		echo '<td>'.$row['date_occur'].'</td>';
		echo '<td>'.$row['cheated_money'].'</td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['service'].'</td>';
		echo '<td>'.$row['date_submitted'].'</td>';
		echo '<td><a class="btn btn-warning" role="button" href="viewcase.php?id='.$row['report_number'].'""><i class="fa fa-file"></i> View Report</a></td></td>';

	}
	echo '</tbody></table>';
	echo '</div>';

}
else{
	echo "<center>No new data at the moment.</center>";
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

