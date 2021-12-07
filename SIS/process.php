<?php
require_once('config.php');
?>
<?php

echo "hello from process"; 
if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
    $middlename 	= $_POST['middlename'];
	$lastname 		= $_POST['lastname'];
	$phone	        = $_POST['phone'];
	$address 		= $_POST['address'];
	$civilstatus 	= $_POST['civilstatus'];
    $email 			= $_POST['email'];
	$password 		= sha1($_POST['password']);

		$sql = "INSERT INTO student (F_name, M_name, L_name, Phone, address, civilstatus, Email, Password ) VALUES(?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phone, $address, $civilstatus, $password]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}