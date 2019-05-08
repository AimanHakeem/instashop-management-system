<?php
require '../dbconn.php';
$feedback = $_POST['feedback']; 
$item = $_POST['item'];
$rating = $_POST['rating'];
$id_user = $_POST['id_user'];
$id_instashop = $_POST['id_instashop'];

$stmt = $con->prepare('INSERT INTO feedback (id_instashop, id_user, feedback, item, rating, date_submitted) VALUES (:id_instashop, :id_user, :feedback,:item, :rating, now())');
$stmt->bindParam(':id_instashop',$id_instashop);
$stmt->bindParam(':id_user',$id_user);
$stmt->bindParam(':feedback',$feedback);
$stmt->bindParam(':item',$item);
$stmt->bindParam(':rating',$rating);
$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
	header('location:../viewprofile.php?id='.$id_instashop.'');
}
else{
	var_dump($_POST);
	echo 'error';
}

?>