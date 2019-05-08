<?php 
include '../dbconn.php';
session_start();
$id_user = $_POST['id_user'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];





$sql = ('UPDATE user_detail SET name = :name, gender = :gender, age = :age, email = :email, phone_number = :phone_number, address = :address, city = :city, postcode = :postcode, state = :state WHERE id_user = :id_user');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
$stmt->bindParam(':age', $age, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':phone_number', $phone, PDO::PARAM_STR);
$stmt->bindParam(':address', $address, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
$stmt->bindParam(':state', $state, PDO::PARAM_STR);

$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
    ?>
    <script type="text/javascript">
        alert("User information successfully updated!");
        window.location = '../user/accountsetting.php';
    </script>
    <?php
}
    else{
    echo $sql;//header('location:../instashop/accountsetting.php?stats=2');
}


?>
