<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$cardnumber 		= $_POST['cardnumber'];
	$name 		= $_POST['name'];
	$email 			= $_POST['email'];
	$month	= $_POST['month'];
	$cvc 		= sha1($_POST['cvc']);

		$sql = "INSERT INTO payment (cardnumber, name, email, month, cvc ) VALUES(?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$cardnumber, $name, $email, $month, $cvc]);
		if($result){
			echo 'Successfully Paid!
			Email:wufo@admin.com
			Password:password';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}