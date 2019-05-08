<?php 

include_once '../dbconn.php';

$username=$_POST['username'];
$password=$_POST['password'];


if ((isset($username)) && (isset($password))) {

	$stmt = $con->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
	$stmt->bindParam (1, $username);
	$stmt->bindParam (2, $password);
	$stmt->execute();

	$num = $stmt->rowCount();

	if($num){
		//login ada
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		session_start();
		
		
		$_SESSION['start'] = TRUE;
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['id_role'] = $row['id_role'];
		$_SESSION['last_login'] = $row['last_login'];
		$_SESSION['last_actv'] = time();

		if ($row['suspend'] == '0') {
			if($row['id_role'] == '1'){

				header("location:../admin/adminpanel.php");
			}
			elseif($row['id_role'] == '2'){

				header("location:../admin2/index.php");
			}
			elseif($row['id_role'] == '3'){

				header("location:../instashop/index.php");
			}
			elseif($row['id_role'] == '4'){

				header("location:../user/index.php");
			}
		}
		else{
			session_destroy();
?>
			<script type="text/javascript">
	alert("The user has been suspended");
	window.location = '../login.php';
</script>
<?php
		}
		
		
	}

	else{
		header("location:../login.php?stat=2");

		//header("location:../index.php?stat=err");
	}
	
}


else{
	header("location:../index.php??stat=2");
}

?>