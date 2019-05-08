<?php
include '../dbconn.php';
$status = '0';
$id_user = $_GET['id'];
$sql = ('UPDATE instashop SET status = :status WHERE id_user = :id_user');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
?>
<script type="text/javascript">
	alert("Instashop trusted status has been removed!");
	window.location = '../admin/viewtrustedinstashop.php';
</script>
<?php
}
?>
