<?php
session_start();
require '../dbconn.php';

$id = $_SESSION['id_user'];
$stmt = $con->prepare('SELECT * FROM feedback, user_detail WHERE feedback.id_user = user_detail.id_user AND feedback.id_instashop = :id');
$stmt->bindParam(':id',$id);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
	$n = 1;
	echo '<div class="table-responsive">';
	echo '<table style="width: 900px; id="example" id="mysdata" class="table table-striped">';
	echo '<thead><th>No.</th><th>Feedback by</th><th>Item / Service Purchased</th><th>Feedback</th><th>Rating</th><th>Date</th></thead><tbody>';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr id="row'.$row['id_feedback'].'"><td>'.$n.'</td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['item'].'</td>';
		echo '<td>'.$row['feedback'].'</td>';
		$rating = $row['rating'];
		if ($rating == 1) {
			$star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			echo '<td>'.$star.'</td>';
		}
		elseif ($rating == 2) {
			$star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			echo '<td>'.$star.$star.'</td>';
		}
		elseif ($rating == 3) {
			$star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			echo '<td>'.$star.$star.$star.'</td>';
		}
		elseif ($rating == 4) {
			$star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			echo '<td>'.$star.$star.$star.$star.'</td>';
		}
		elseif ($rating == 5) {
			$star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			echo '<td>'.$star.$star.$star.$star.$star.'</td>';
		}
		echo '<td>'.$row['date_submitted'].'</td>';
		$n++;
	}
	echo '</tbody></table>';
	echo '</div>';
}
else{
	'<center> No Feedback from user at the moment</center>';
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

