<?php
include '../dbconn.php';
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$unique = $today . $rand;

$status = '0';
$id_user = $_POST['id_user'];

$date_occur = $_POST['date_occur'];
$cheated_money = $_POST['cheated_money'];
$cheated_story = $_POST['cheated_story'];
$name = $_POST['name'];
$service = $_POST['service'];
$phone_no = $_POST['phone_no'];
$ic_no = $_POST['ic_no'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];






	$sql = $con->prepare('INSERT INTO scammer (report_number, id_user, date_occur, cheated_money, cheated_story, name, service, phone_no, ic_no, facebook_url, instagram, status, date_submitted) VALUES (:unique, :id_user, :date_occur, :cheated_money, :cheated_story, :name, :service, :phone_no, :ic_no, :facebook, :instagram, :status, now())');
	$sql->bindParam(':unique',$unique);
	$sql->bindParam(':id_user',$id_user);
	$sql->bindParam(':date_occur',$date_occur);
	$sql->bindParam(':cheated_money',$cheated_money);	
	$sql->bindParam(':cheated_story',$cheated_story);
	$sql->bindParam(':name',$name);
	$sql->bindParam(':service',$service);
	$sql->bindParam(':phone_no',$phone_no);
	$sql->bindParam(':ic_no',$ic_no);
	$sql->bindParam(':facebook',$facebook);
	$sql->bindParam(':instagram',$instagram);
	$sql->bindParam(':status',$status);
	$sql->execute();
	$num = $sql->rowCount();
	if ($num) {
		echo "registered";
	}
	else{
		echo "something is not right!";
	}

//if (isset(($bank) && ($holdername))) {
	$query = 'INSERT INTO scammer_bank (report_no, bank_name, account_holder, bank_account) VALUES (:unique, :bank_name, :account_holder, :account_no)';
	for($count = 0; $count<count($_POST['holdername']); $count++){
		$data = array(':unique' => $unique, ':bank_name' => $_POST['banktype'][$count], ':account_holder' => $_POST['holdername'][$count], ':account_no' => $_POST['bankaccount'][$count]);

		$statement = $con->prepare($query);

 		$statement->execute($data);


 		$num = $statement->rowCount();
 		if ($num) {
 			echo "OK!";
 		}
 		else{
 			echo "ERROR!";
 		}
	}
//}

if (!empty($_FILES['files']['name'][0])) {
	$files = $_FILES['files'];
	
	$uploaded = array();
	$failed = array();

	$allowed = array("jpeg", "gif", "png", "jpg");
	
	foreach ($files['name'] as $position => $file_name) {
		$file_tmp = $files['tmp_name'][$position];
		$file_size = $files['size'][$position];
		$file_error = $files['error'][$position];

		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		if (in_array($file_ext, $allowed)) {
			if ($file_error === 0) {
				if ($file_size <= 5555555) {
					
					$file_name_new = uniqid('', true) . '.' .$file_ext;
					$file_destination = 'img/' . $file_name_new;

					if (move_uploaded_file($file_tmp, $file_destination)) {
						$stmt = $con->prepare("INSERT INTO scammer_proof (report_no, proof) values (:unique, :filename)");
						$stmt->bindParam(':unique',$unique);
						$stmt->bindParam(':filename', $file_name_new);
						$stmt->execute();
						$num = $stmt->rowCount();
						if ($num) {
							?>
                            <script type="text/javascript">
                            alert("Your report successfully sent. Please wait for Admin to review the report. Thank You.");
                            window.location = '../user/reportscammer.php';
                            </script>
                            <?php
						}
						$uploaded[$position] = $file_destination;
					}
					else{
						$failed[$position] = "[{$file_name}] failed to upload";
					}
				
			}
				else{
					?>
					<script type="text/javascript">
						alert("The file is too large.");
						window.location = '../user/reportscammer.php';
					</script>
					<?php
				}
			}
			else{
				?>
				<script type="text/javascript">
					alert("Error uploading file.");
					window.location = '../user/reportscammer.php';
				</script>
				<?php
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert("The file extension is not allowed.");
				window.location = '../user/reportscammer.php';
			</script>
			<?php
		}
	}

}
?>
