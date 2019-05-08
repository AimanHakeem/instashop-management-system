<?php

require 'dbconn.php';
$query = "INSERT INTO scammer_bank (bank_name, account_holder, bank_account) VALUES (:bank_name, :account_holder, :account_no)";

for($count = 0; $count<count($_POST['hidden_banktype']); $count++)
{
 $data = array(':bank_name' => $_POST['hidden_banktype'][$count], ':account_holder' => $_POST['hidden_account_holder'][$count], ':account_no' => $_POST['hidden_account_no'][$count]);
 $statement = $con->prepare($query);
 $statement->execute($data);
}

?>


