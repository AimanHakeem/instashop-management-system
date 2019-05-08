<?php
include '../dbconn.php';
$status = '0';
$id_user = $_GET['id'];
$sql = ('UPDATE user SET suspend = :status WHERE id_user = :id_user');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
?>
<script type="text/javascript">
	alert("The user has been activated!");
	window.location = '../admin/viewuseraccount.php';
</script>
<?php
}
?>
