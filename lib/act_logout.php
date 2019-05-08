<?php
require '../dbconn.php';
session_start();
$_SESSION['id_user'];
//$time1 = now();

$stmt = $con->prepare('UPDATE user SET last_login = now() WHERE id_user = '.$_SESSION['id_user'].'');
$stmt->execute();
$num = $stmt->rowCount();
/*if ($num) {
	echo 'Recorded!';
}
else{
	echo 'Nope , not today';
}*/

session_destroy();
if(isset($_GET['redirect'])) {
	header('Location: '.base64_decode($_GET['redirect']));  
} else {
	header("Location: ../login.php?stat=bye");  
}
?>