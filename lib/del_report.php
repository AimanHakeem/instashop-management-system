<?php
include '../dbconn.php';
$reportno = $_GET['id'];

$sql = ('DELETE FROM scammer WHERE report_number = :id');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $reportno);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
	$sql = ('DELETE FROM scammer_bank WHERE report_no = :id');
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $reportno);
	$stmt->execute();
	$num = $stmt->rowCount();
	if ($num) {
			?>
			<script type="text/javascript">
				alert("Report has been deleted!");
				window.location = '../admin/viewcomplaint.php';
			</script>
			<?php
		$sql = ('DELETE FROM scammer_proof WHERE report_no = :id');
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $reportno);
		$stmt->execute();
		$num = $stmt->rowCount();
		if ($num) {
			?>
			<script type="text/javascript">
				alert("Report has been deleted!");
				window.location = '../admin/viewcomplaint.php';
			</script>
			<?php
		}
	}
}
else{
	echo 'error';
}
?>
