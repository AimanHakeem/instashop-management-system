<?php
include '../dbconn.php';
$status = '1';
$reportno = $_GET['id'];
$sql = ('UPDATE scammer SET status = :status, date_approved = now() WHERE report_number = :id');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $reportno);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
?>
<script type="text/javascript">
	alert("Report has been approved and published!");
	window.location = '../admin/viewcomplaint.php';
</script>
<?php
}
?>
