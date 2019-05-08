<?php 
require '../dbconn.php';

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$id_role = '4';
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



if ((!isset($errors2)) && (!isset($errors1)) && (isset($name)) && (isset($gender)) && (isset($age)) && (isset($email)) && (isset($phone)) && (isset($address)) && (isset($city)) && (isset($postcode)) && (isset($state))){
	addUserDetail($con, $id, $name, $gender, $age, $email, $phone, $address, $city, $postcode, $state);
}
function addUserDetail ($con, $id, $name, $gender, $age, $email, $phone, $address, $city, $postcode, $state){
	$stmt = $con->prepare('INSERT INTO user_detail (id_user, name, gender, age, email, phone_number, address, city, postcode, state) VALUES (:id, :name, :gender, :age, :email, :phone, :address, :city, :postcode, :state)');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
	$stmt->bindParam(':age', $age, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
	$stmt->bindParam(':address', $address, PDO::PARAM_STR);
	$stmt->bindParam(':city', $city, PDO::PARAM_STR);
	$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
	$stmt->bindParam(':state', $state, PDO::PARAM_STR);
	$stmt->execute();

	$num = $stmt->rowCount();
	if ($num) {
		//header("Location: ");
		echo "jadi";
	}
	else{
		echo "err";
	}
}


?>

<meta http-equiv="refresh" content="0; ../login.php?success=1">
