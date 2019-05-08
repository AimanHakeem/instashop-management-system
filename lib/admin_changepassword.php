<?php 
require '../dbconn.php';
session_start();
if (!isset($_SESSION['id_user'])) {
	$id = $_SESSION['id_user'];
	header('location: ../login.php');
}
$id = $_SESSION['id_user'];
$npassword = $_POST['npassword'];
$opassword = $_POST['password'];


if ((isset($opassword))) {
	$stmt = $con->prepare('SELECT * FROM user WHERE id_user = ? AND password = ?');
	$stmt->bindParam (1, $id);
	$stmt->bindParam (2, $opassword);
	$stmt->execute();

	$num = $stmt->rowCount();
	if ($num) {
		if ((isset($npassword))) {
			$sql = ('UPDATE user SET password = :npassword WHERE id_user = :id');
			$stmt = $con->prepare($sql);

			$stmt->bindParam(':npassword', $npassword, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);

			$stmt->execute();
			$num = $stmt->rowCount();

			if ($num) {
				header('location:../admin/changepassword.php?stat=1');
			}
			else{
		//echo "Gagal Kemaskini Pegawai !";
				header('location:../admin/changepassword.php?stat=2');
			}
		}
		else{
			echo '<meta http-equiv="refresh" content="0; ../admin/changepassword.php?stat=1>';
		}
	}
	else{
		 header('location:../admin/changepassword.php?stat=3');
	}
}


?>

