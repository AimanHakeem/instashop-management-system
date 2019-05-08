<?php
if(!isset($_SESSION['id_role'])){
	header('location:../index.php?s=end');
}
$role = $_SESSION['id_role'];


if($role == '2'){
	header("location:../admin2/index.php");
}

elseif($role == '3'){
	header("location:../instashop/index.php");
}

elseif ($role == '4') {
	header("location:../user/index.php");
}
else{
	;
}
?>