<?php 
require '../dbconn.php';

$username = $_POST['username'];
$password = $_POST['password'];
$iusername = $_POST['iusername'];
$fbusername = $_POST['fbusername'];
$website = $_POST['website'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ssm = $_POST['ssm'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$service = $_POST['service'];
$year = $_POST['year'];
$id_role = '3';
$email2 = $_POST['email'];

$sql = $con->prepare('SELECT * FROM user WHERE username = ?');
	$sql->bindParam (1, $username);
	$sql->execute();

	$count = $sql->rowCount();
if ($count>0) {
	$errors1[] = "ERROR";
	header('location:../userregister.php?stats=1');
}

$sql2 = $con->prepare('SELECT * FROM user_detail, instashop WHERE user_detail.email = ? OR instashop.email = ?');
	$sql2->bindParam (1, $email);
	$sql2->bindParam (2, $email2);
	$sql2->execute();

	$count2 = $sql2->rowCount();


if ($count2>0) {
	$errors2 = "ERROR2";
	header('location:../userregister.php?stats=2');
}

if ((!isset($errors1)) && (!isset($errors2)) && (isset($username)) && (isset($password))) {
	adduser($con, $id_role, $username, $password);
}

function adduser ($con, $id_role, $username, $password){
	$stmt = $con->prepare('INSERT INTO user (id_role, username, password, date_register) VALUES (:id_role, :username, :password, now())');

	$stmt->bindParam(':id_role', $id_role, PDO::PARAM_INT);
	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt->bindParam(':password', $password, PDO::PARAM_STR);
	$stmt->execute();
	$num = $stmt->rowCount();

	if ($num) {
		echo "Registered";

	}
	else{
		echo "errrr";
		
	}
}

$id = $con->lastInsertID();


if ((!isset($errors1)) && (!isset($errors2)) && (isset($iusername)) && (isset($fbusername)) && (isset($website)) && (isset($email)) && (isset($phone)) && (isset($ssm)) && (isset($address)) && (isset($city)) && (isset($postcode)) && (isset($state)) && (isset($service)) && (isset($year))){
	addUserDetail($con, $id, $iusername, $fbusername, $website, $email, $phone, $ssm, $address, $city, $postcode, $state, $service, $year);
}

function addUserDetail ($con, $id, $iusername, $fbusername, $website, $email, $phone, $ssm, $address, $city, $postcode, $state, $service, $year){
	$stmt = $con->prepare('INSERT INTO instashop (id_user, instagram, facebook, website, email, ssm_no, company_address, city, postcode, state, year_involved, phone_number, service_provided) VALUES (:id, :iusername, :fbusername, :website, :email, :ssm, :address, :city, :postcode, :state, :year, :phone, :service)');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':iusername', $iusername, PDO::PARAM_STR);
	$stmt->bindParam(':fbusername', $fbusername, PDO::PARAM_STR);
	$stmt->bindParam(':website', $website, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':ssm', $ssm, PDO::PARAM_STR);
	$stmt->bindParam(':address', $address, PDO::PARAM_STR);
	$stmt->bindParam(':city', $city, PDO::PARAM_STR);
	$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
	$stmt->bindParam(':state', $state, PDO::PARAM_STR);
	$stmt->bindParam(':year', $year, PDO::PARAM_STR);
	$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
	$stmt->bindParam(':service', $service, PDO::PARAM_STR);
	$stmt->execute();

	$num = $stmt->rowCount();
	if ($num) {
		//header("Location: ");
		echo "jadi";
	}
	else{
		echo " error";
	}
}


?>
<meta http-equiv="refresh" content="0; ../login.php?success=1">
